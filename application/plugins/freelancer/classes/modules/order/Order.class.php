<?php


class PluginFreelancer_ModuleOrder extends ModuleORM
{
    protected $mapper;
    
    protected $aBehaviors=array(
        'category'=> array(
                'class'=>'ModuleCategory_BehaviorModule',
                'target_type'=>'specialization',
        ),
        //'property'=>'ModuleProperty_BehaviorModule',
        'ygeo' =>array(
            'class'=>'PluginYdirect_ModuleGeo_BehaviorModule',
            'target_type'=>'order'
        ),
        'favourites' => 'PluginFreelancer_ModuleFavourites_BehaviorModule'
    );
    
    public function Init()
    {
        parent::Init();
        $this->Hook_Run('freelancer_init_order_module',['module' => &$this]);
        $this->mapper = Engine::GetMapper(__CLASS__);
    }  
    
    public function GetOrderById($iId) {
        if($oOrder = $this->PluginFreelancer_Order_GetOrderById($iId)){
            return $oOrder;
        }
        return false;
    }
    
    public function SaveGeoOrder($oGeoTarget, $oOrder) {
        
        
        if($oGeoCity = $this->Geo_GetCityById($oGeoTarget->_getDataOne('city_id'))){
            $oGeo = $oGeoCity;
        }elseif ($oGeoRegion = $this->Geo_GetRegionById($oGeoTarget->_getDataOne('region_id'))) {
            $oGeo = $oGeoRegion;
        }elseif ($oGeoCountry = $this->Geo_GetCountryById($oGeoTarget->_getDataOne('country_id'))) {
            $oGeo = $oGeoCountry;
        }
        $this->Geo_AddTargetType('order');
        $this->Geo_CreateTarget($oGeo, 'order', $oOrder->getId());     
        
    }
    
    public function SaveUserFieldValues($aFields, $oUser) {
        $aValues =[];
        foreach ($aFields as $oField){
            $aValues[$oField->getId()] = $oField->getValue();
        }
        $this->User_setUserFieldsValues($oUser->getId(),$aValues);
    }
    
    public function GetGeoFilter($aGeoParams = [], $sTargetType = 'order') 
    {
        $sFilter = '';
        
        $iCountryId = isset($aGeoParams['country'])?$aGeoParams['country']:false;
        $iRegionId = isset($aGeoParams['region'])?$aGeoParams['region']:false;
        $iCityId = isset($aGeoParams['city'])?$aGeoParams['city']:false;
        
        if($iCityId && $this->Validate_Validate('number', $iCityId)){ 
            $sFilter .= 'gt.city_id = '.$iCityId;
        }elseif($iRegionId && $this->Validate_Validate('number', $iRegionId)){ 
            if($sFilter != '')
                $sFilter .= ' or ';
            $sFilter .= 'gt.region_id = '.$iRegionId;
        }elseif($iCountryId && $this->Validate_Validate('number', $iCountryId)){ 
            if($sFilter != '')
                $sFilter .= ' or ';
            $sFilter .= 'gt.country_id = '.$iCountryId;                
        }
        
        if($sFilter == '')
            return null;
        $aGeoFilter =
            "JOIN " . Config::Get('db.table.geo_target') . " AS gt ON 
                t.{$sTargetType}_id = gt.target_id and
                gt.target_type = '{$sTargetType}' and ".$sFilter
            ;
        return $aGeoFilter;
    }
    
    public function GetCountOrdersByUserId($iUserId) {
        return $this->mapper->GetCountOrdersByUserId($iUserId);
    }    
    public function GetCountOrdersByMasterId($iUserId) {
        return $this->mapper->GetCountOrdersByMasterId($iUserId);
    }
    public function GetCountDoneOrdersByMasterId($iUserId) {
        return $this->mapper->GetCountDoneOrdersByMasterId($iUserId);
    }
    public function GetCountResponseByUserId($iUserId){
        return $this->mapper->GetCountResponseByUserId($iUserId);
    }
    public function GetCountOrdersByFilter($iUserId) {
        return $this->mapper->GetCountOrdersByUserId($iUserId);
    } 
}