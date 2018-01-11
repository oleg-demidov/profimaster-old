<?php

class PluginFreelancer_ModuleMedia_BehaviorEntity extends Behavior
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
        'before_delete'   => 'CallbackBeforeDelete',
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
            $aFields = $aParams['aFields'];    
            if (is_null($aFields)) {
                $oValidator = $this->Validate_CreateValidator('media_check', $this, 'media');
                $oValidator->validateEntity($this->oObject, $aFields);
                $aParams['bResult'] = !$this->oObject->_hasValidateErrors();
            } 
        }
    }
    
    public function ValidateMediaCheck($mValue) {
        $aMediaRequest = getRequest('media',$mValue);
        if(!is_array($aMediaRequest)){
            if($this->getParam('validate_require') ){
                return 'Выберете медиа файл';
            }else{
                return true;
            }
        }
        $aMedia = $this->Media_GetMediaItemsByFilter(['id in' => $aMediaRequest]);
        if(sizeof($aMedia) != sizeof($aMediaRequest)){
            return 'Не верный медиа файл';
        }else{
            //print_r($aMediaRequest);
            $this->oObject->_setData(['media' => $aMediaRequest]);
        }
        return true;
    }

    /**
     * Коллбэк
     * Выполняется после сохранения сущности
     */
    public function CallbackAfterSave()
    {
        $aMedia = $this->oObject->_getDataOne('media');
        
        if(is_null($aMedia)){ 
            return;            
        }
        
        if(!sizeof($aMedia)){
            $aMedia[] = 0;
        }
        
        $aMedia = array_unique($aMedia);

        $aMediaTargetsDel = $this->getMediaTargets(['#where'=>['media_id not in (?a)' => [$aMedia]]]);

        foreach ($aMediaTargetsDel as $oMediaTargetDel) { $oMediaTargetDel->Delete(); }
        
        $aMediaTargetsReady = $this->getMediaTargets(['media_id in' => $aMedia, '#index-from' => 'media_id']);
        
        foreach($aMedia as $iMediaId){
            if(!array_key_exists($iMediaId, $aMediaTargetsReady) and $iMediaId){
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
    public function CallbackBeforeDelete()
    {
        if($aMediaTargets = $this->getMediaTargets()){
            foreach($aMediaTargets as $oMediaTarget){
                $oMediaTarget->Delete();
            }
        }
    }
    
    public function getMediaTargets($aFilter = [])
    {
        return $aMediaTargets = $this->Media_GetTargetItemsByFilter(array_merge([
            'target_id' => $this->oObject->_getPrimaryKeyValue(),
            'target_type' => $this->getTargetType()],$aFilter)
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