<?php

class PluginFreelancer_ModuleNotify_BehaviorEntity extends Behavior
{
    /**
     * Дефолтные параметры
     *
     * @var array
     */
    protected $aParams = array(
        // Уникальный код
        'target_type'                    => '',
        // Обязательное заполнение категории
        'validate_require'               => false,
        // Минимальное количество категорий, доступное для выбора
        'validate_min'                   => 0,
        // Максимальное количество категорий, доступное для выбора
        'validate_max'                   => 50,
    );
    /**
     * Список хуков
     *
     * @var array
     */
    protected $aHooks = array(
        'validate_after' => 'CallbackValidateAfter',
        'after_save'     => 'CallbackAfterSave',
        'after_delete'   => 'CallbackAfterDelete',
    );

    /**
     * Инициализация
     */
    protected function Init()
    {
        parent::Init();
    }

    /**
     * Коллбэк
     * Выполняется при инициализации сущности
     *
     * @param $aParams
     */
    public function CallbackValidateAfter($aParams)
    {
        if ($aParams['bResult'] ) {
            $aMediaRequest = getRequest('media');
            if($this->getParam('validate_require') and !$aMediaRequest){
                $aParams['bResult'] = false;
            }
            $aMedia = $this->Media_GetMediaItemsByFilter(['id in' => $aMediaRequest]);
            if(sizeof($aMedia) != sizeof($aMediaRequest)){
                $aParams['bResult'] = false;
            }else{
                $aMediaTargets = $this->getMediaTargets();//print_r($aMediaTargets);
                foreach($aMediaTargets as $oMediaTarget){
                    if($aKeys = array_keys($aMediaRequest, $oMediaTarget->getMediaId() )){
                        foreach($aKeys as $iKey){
                            unset($aMediaRequest[$iKey]);
                        }
                    }else{
                        $oMediaTarget->Delete();
                    }
                }
                //print_r($aMediaRequest);
                $this->oObject->_setData(['medias_for_save' => $aMediaRequest]);
            }
        }
    }

    /**
     * Коллбэк
     * Выполняется после сохранения сущности
     */
    public function CallbackAfterSave()
    {
        if($aMedia = $this->oObject->_getDataOne('medias_for_save')){
            foreach($aMedia as $iMediaId){
                $oMediaTarget = Engine::GetEntity("Media_Target");
                $oMediaTarget->setMediaId($iMediaId);
                $oMediaTarget->setTargetId($this->oObject->_getPrimaryKeyValue());
                $oMediaTarget->setTargetType($this->getTargetType());
                $oMediaTarget->Save();
            }
        }
    }

    /**
     * Коллбэк
     * Выполняется после удаления сущности
     */
    public function CallbackAfterDelete()
    {
        if($aMediaTargets = $this->getMediaTargets()){
            foreach($aMediaTargets as $oMediaTarget){
                $oMediaTarget->Delete();
            }
        }
    }
    
    public function getMediaTargets()
    {
        return $aMediaTargets = $this->Media_GetTargetItemsByFilter([
            'target_id' => $this->oObject->_getPrimaryKeyValue(),
            'target_type' => $this->getTargetType()]
                );
    }
    
    public function getMedia($aFilter = [])
    {
        $aMedia = [];
        if($aMediaTargets = $this->getMediaTargets()){
            foreach($aMediaTargets as $oMediaTarget){
                $aMedia[] = $oMediaTarget->getMedia();
            }
        }
        if(!sizeof($aMedia) and $aMediaRequest = getRequest('media')){
            $aFilter['id in'] = $aMediaRequest;
            $aMedia = $this->Media_GetMediaItemsByFilter($aFilter);
        }
        return $aMedia;
    }
    public function getMediaOne($aFilter = [])
    {
        $aFilter['#limit'] = 1;
        $aMedia = $this->getMedia($aFilter);
        return current($aMedia);
    }
    
    public function getTargetType()
    {
        return strtolower(Engine::GetEntityName($this->oObject));
    }

}