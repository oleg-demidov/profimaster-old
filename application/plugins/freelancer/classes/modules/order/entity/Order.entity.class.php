<?php


class PluginFreelancer_ModuleOrder_EntityOrder extends EntityORM
{
    protected $aBehaviors=array(
        // Настройка категорий
        'category'=>array(
            'class'=>'ModuleCategory_BehaviorEntity',
            'target_type'=>'specialization',
            'form_field'=>'specialization[]',
            'multiple'=>true,
            'validate_enable'=>false,
            'object_type' => 'order',
            'classes' => 'specialization'
        ),
        'media'=>array(
            'class'=>'PluginFreelancer_ModuleMedia_BehaviorEntity',
            'target_type'=>'order'
        ),
        'ygeo' =>array(
            'class'=>'PluginYdirect_ModuleGeo_BehaviorEntity',
            'target_type'=>'order'
        ),
        'favourites' => 'PluginFreelancer_ModuleFavourites_BehaviorEntity'
    );
    
    protected $aValidateRules=array(
        // Используем стандартный валидатор String
        array('text_about','string','max'=>2000,'min'=>20, 'allowEmpty' => false),
        // Реализуем свою валидацию методом ValidateMy
        array('budjet','number','max'=>200000000,'min'=>1, 'allowEmpty' => true),
        
        array('specialization','specialization'),
       // array('_geo_target','geo'),
        array("title", 'string', 'max'=>100, 'min'=>3, 'allowEmpty' => false)
    );
    
    public function ValidateGeo(){
        if(!$oGeoObject = $this->getGeoObject()){
            return $this->Lang_Get('plugin.freelancer.errors.no_region');
        }
    	if(!$oGeoObject->getRegion() ){
              return $this->Lang_Get('plugin.freelancer.errors.no_region');
        }
        return true;
    }
    
    public function ValidateSpecialization($sValue) {
        $aSpec = $this->Category_GetCategoryItemsByFilter(['id in' => $sValue, '#index-from-primary']);
        $iCount = sizeof($aSpec);
        if(!$oUser = $this->User_GetUserById($this->getUserId())){
            return 'Пользователь не существует';
        }
        if(!$oUser->isSpecializationOrder( ['count' => $iCount])){
            return $this->Rbac_GetMsgLast();
        }
        if($iCount){
            $this->_setData(array('_categories_for_save' => array_keys($aSpec)));
            return true;
        }
        //print_r($this);
        return $this->Lang_Get('plugin.freelancer.errors.one_spec');
    }
    protected $aRelations = array(
        'user'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'ModuleUser_EntityUser','user_id'),
        'master'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'ModuleUser_EntityUser','master_id'),
        'bids'=>array(EntityORM::RELATION_TYPE_HAS_MANY,'PluginFreelancer_ModuleOrder_EntityBid','order_id'),
    );
    
    
    protected function beforeSave()
    {
        if ($bResult = parent::beforeSave()) {
            if($this->_isNew()){
                if($this->User_GetUserCurrent()->isAdministrator()){
                    return $bResult;
                }
                if(!$bResult = $this->Rbac_IsAllow('create_order','freelancer')){
                    $this->Message_AddError($this->Rbac_GetMsgLast());
                }
            }
        }
        return $bResult;
    }
    
    protected function afterSave()
    {
        parent::afterSave();
        //$this->Notify
        return true;
    }
    
    protected function afterDelete() {
        parent::afterDelete();
        $aBids = $this->getBids();
        foreach($aBids as $oBid){
            $oBid->Delete();
        }
    }
    
    public function getCountBids($aFilter = []) {
        return $this->PluginFreelancer_Order_GetCountItemsByFilter(
                array_merge($aFilter,['order_id' => $this->getId()]), 
                "PluginFreelancer_ModuleOrder_EntityBid");
    }    
     
    public function setGeoData($aGeo){
        
        $oGeoTarget = Engine::GetEntity('Geo_Geo');
    	 if (isset($aGeo['city']) && $aGeo['city']) {
                $oGeoObject = $this->Geo_GetGeoObject('city', (int)$aGeo['city']);
            } elseif (isset($aGeo['region']) && $aGeo['region']) {
                $oGeoObject = $this->Geo_GetGeoObject('region', (int)$aGeo['region']);
            } elseif (isset($aGeo['country']) && $aGeo['country']) {
                $oGeoObject = $this->Geo_GetGeoObject('country', (int)$aGeo['country']);
            } else {
                $oGeoObject = null;
            }
          $this->setGeoObject($oGeoObject);
          
          return $oGeoTarget;
    }
    
        
    public function _getUrlEdit() {
        return Config::Get('path.root.web').'/order/edit/'.$this->getId();
    }
    
    public function _getUrlView() {
        return Config::Get('path.root.web').'/order/'.$this->getId();
    }
    
    public function _isAllowEdit() {
        if($oUser = $this->User_GetUserCurrent()){
            return ($oUser->getId() == $this->getUserId() or $oUser->isAdministrator());
        }
        return false;
    }
    
    public function isCreator($oUser) {
        return ($oUser->getId() == $this->getUserId() or $oUser->isAdministrator());
    }
    
    
    public function getCropText($iCropWords = 10) {
        if(!$iCropWords){
            $iCropWords = Config::Get('plugin.freelancer.poisk.item_desc_words');
        }
        return strip_tags(func_text_words($this->getTextAbout(), $iCropWords));
    }
    public function isCanBid($oUser) {
        if(!$oUser){
            if(  !$oUser = $this->User_GetUserCurrent()){
                return false;
            }
        }
        if(count($this->getBids(['user_id' => $oUser->getId()]))){
            return false;
        }
        return $oUser->isCreateBid();
    }
    public function getBudjetStr() {
        return ($this->getBudjet())?$this->getBudjet():"Договорной";
    }
    
    public function getTitleCrop($iCrop) {
        return func_text_words($this->getTitle(), $iCrop);
    }
    public function getStatus() {
        if($sStatus = $this->_getDataOne('status')){
            return $sStatus;
        }
        return 'new';
    }
}