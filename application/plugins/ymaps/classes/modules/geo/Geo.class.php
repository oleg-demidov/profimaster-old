<?php


/**
 *
 * @author oleg
 */


class PluginYmaps_ModuleGeo extends ModuleORM{
        
    public function Init() {
        parent::Init();
    }
    
    public function GetBehaviorFor($sTargetType) {
        return array(
            'class'=>'PluginYmaps_ModuleGeo_BehaviorEntity',
            'target_type'=>$sTargetType,
            'form_field' =>Config::Get('plugin.ymaps.location.field_name')
        );
    }
    
       

    /**
     * Переопределяем метод для возможности цеплять свои кастомные данные при ORM запросах - свойства
     *
     * @param array $aResult
     * @param array $aFilter
     * @param string $sTargetType
     */
    public function RewriteGetItemsByFilter($aResult, $aFilter, $sTargetType)
    {
        if (!$aResult) {
            return;
        }
        /**
         * Список на входе может быть двух видов:
         * 1 - одномерный массив
         * 2 - двумерный, если применялась группировка (использование '#index-group')
         *
         * Поэтому сначала сформируем линейный список
         */
        if (isset($aFilter['#index-group']) and $aFilter['#index-group']) {
            $aEntitiesWork = array();
            foreach ($aResult as $aItems) {
                foreach ($aItems as $oItem) {
                    $aEntitiesWork[] = $oItem;
                }
            }
        } else {
            $aEntitiesWork = $aResult;
        }

        if (!$aEntitiesWork) {
            return;
        }
        /**
         * Проверяем необходимость цеплять категории
         */
        if (isset($aFilter['#with']['#ymaps'])) { 
            $this->AttachGeoForTargetItems($aEntitiesWork, $sTargetType);
        }
    }

    /**
     * Цепляет для списка объектов геокоординаты
     *
     * @param array $aEntityItems
     * @param string $sTargetType
     */
    public function AttachGeoForTargetItems($aEntityItems, $sTargetType)
    {
        if (!is_array($aEntityItems)) {
            $aEntityItems = array($aEntityItems);
        }
        $aEntitiesId = array();
        foreach ($aEntityItems as $oEntity) {
            $aEntitiesId[] = $oEntity->getId();
        }
        /**
         * Получаем геокоординаты для всех объектов
         */
        $oGeoTable = MapperORM::GetTableName(Engine::GetEntity('PluginYmaps_Geo_Geo'));

        $aGeos = $this->GetCategoryItemsByFilter(array(
            'target_type' => $sTargetType,
            'target_id in' => $aEntitiesId,
            '#index-group' => 'target_id'
        ));
        /**
         * Собираем данные
         */
        foreach ($aEntityItems as $oEntity) {
            if (isset($aGeos[$oEntity->_getPrimaryKeyValue()])) {
                $oEntity->_setData(array('_ymaps' => $aGeos[$oEntity->_getPrimaryKeyValue()]));
            } else {
                $oEntity->_setData(array('_ymaps' => array()));
            }
        }
    }
    
    public function GetUsersWithGeo($aUsersCollection) {
        $aUserIds = [];
        foreach($aUsersCollection as $oUser){
            $aUserIds[] = $oUser->getId();
        }
        
        $aGeo = $this->PluginYmaps_Geo_GetGeoItemsByFilter([
            '#select' => ['t.lat', 't.long','t.target_id'],
            '#index-from' => 'target_id',
            'target_id in' => $aUserIds,
            'target_type' => 'user'
        ]);
        
       
        $aUsers = [];
        foreach($aGeo as $oGeo){
            $oUser = isset($aUsersCollection[$oGeo->getTargetId()])?$aUsersCollection[$oGeo->getTargetId()]:null;  
            if(!$oUser){
                continue;
            }
            $aUserData = ($oUser)?$oUser->_getData(['id', 'user_profile_name', 'user_login']):[];
            $aUsers[] = array_merge( $aUserData, $oGeo->_getData(),
                    ['path' => $oUser->getUserWebPath(),'avatar' => $oUser->getProfileAvatarPath()]);
        }
        
        return $aUsers;
    }
    
}