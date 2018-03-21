<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionFauth_EventRegisterMaster extends Event {

    public function EventStep1() 
    {
        $this->Session_Drop('userData');
        $this->User_Logout();
        
        $oUser= Engine::GetEntity('User_User');
        
        if(isPost()){
            
            $oUser->setSpecialization(getRequest('specialization')); 
            $oUser->setRole('master');
            $oUser->setId(ModuleRbac::ROLE_CODE_GUEST);
            
            $aBehaviors = $oUser->GetBehaviors();
            foreach(array_keys($aBehaviors) as $aBehaviorKey){
                if($aBehaviorKey == 'category'){
                    continue;
                }
                $oUser->DetachBehavior($aBehaviorKey);
            }
            
            $oUser->_setValidateScenario('specialization');
            
            if(!$oUser->_Validate()){
                foreach($oUser->_getValidateErrors() as $sError){
                    $this->Message_AddError(current($sError));
                }                
            }else{
                $this->Session_Set('userData', $oUser->_getData());
                Router::LocationAction('fauth/register_master/step2');
            }
        }
        
        $oBehavior = $oUser->GetBehavior('category');  
        if ($oType = $this->Category_GetTypeByTargetType($oBehavior->getCategoryTargetType())) {
            $aCategories = $this->Category_LoadTreeOfCategory(array('type_id' => $oType->getId()));
        }
        $this->Viewer_Assign('aCategories', $aCategories);  
        
        $this->Component_Add('freelancer:register');
        $this->SetTemplateAction('register_master/step1');
    }
    
    public function EventStep2() 
    {
        $oUser = Engine::GetEntity('User_User', $this->Session_Get('userData'));
        
        if(isPost()){ 
            
            $oUser->setProfileAbout(getRequest('about'));
            $oUser->setGeo(getRequest('geo'));
            $oUser->setLocation(getRequest('location')); 
            
            $oUser->_setValidateScenario('register_master_step2');
            
            $oUser->ymaps->setParam('validate_enable', true);
            $oUser->category->setParam('validate_enable', true);
            
            if(!$oUser->_Validate()){
                foreach($oUser->_getValidateErrors() as $sError){
                    $this->Message_AddError(current($sError));
                }                
            }else{
                $this->Session_Set('userData',$oUser->_getData());
                Router::LocationAction('fauth/register_master/step3');
            }
            
            $aCountries = $this->Geo_GetCountries(array(), array('sort' => 'asc'), 1, 300);
            $this->Viewer_Assign('aGeoCountries', $aCountries['collection']);
            if ($oGeoTarget = $oUser->getGeoTarget()) {
                if ($oGeoTarget->getCountryId()) {
                    $aRegions = $this->Geo_GetRegions(array('country_id' => $oGeoTarget->getCountryId()),
                        array('sort' => 'asc'), 1, 500);
                    $this->Viewer_Assign('aGeoRegions', $aRegions['collection']);
                }
                if ($oGeoTarget->getRegionId()) {
                    $aCities = $this->Geo_GetCities(array('region_id' => $oGeoTarget->getRegionId()),
                        array('sort' => 'asc'), 1, 500);
                    $this->Viewer_Assign('aGeoCities', $aCities['collection']);
                }
            }
        }
        $this->Component_Add('freelancer:register');
        $this->SetTemplateAction('register_master/step2');

        $this->Viewer_Assign('oUser', $oUser);
    }
    
    public function EventStep3() 
    { 
        $this->Session_Set('aRegisterParams', [
            'validate_scenario' => 'register_master_step3',
            'ymaps_validate_enable' => true,
            'category_validate_enable' => true,
            'ymaps_save_enable' => true,
            'category_save_enable' => true,
            'activation_template' => 'register_master/step4'
        ]);
        
        $this->SetTemplateAction('register_master/step3');
        
        return Router::Action('fauth/register');        
        
    }
    
}