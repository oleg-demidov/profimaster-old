<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionFauth_EventRegister extends Event {

    public function EventRegister() 
    { 
        $aRegisterParams = $this->Session_Get('aRegisterParams');
        $aRegisterParams = array_merge([
            'validate_scenario' => 'freelancer_reg',
            'ymaps_validate_enable' => true,
            'category_validate_enable' => true,
            'ymaps_save_enable' => true,
            'category_save_enable' => true,
            'register_template' => 'register_master/step3',
            'activation_template' => 'register_master/step4'
        ],$aRegisterParams);
        
        $this->Component_Add('freelancer:register');
        
        $this->SetTemplateAction($aRegisterParams['register_template']);
        
        if(isPost()){  
            $oUser= Engine::GetEntity('User_User',$this->Session_Get('userData'));

            $oUser->setCaptcha(getRequest('g-recaptcha-response'));
            $oUser->setProfileName(getRequestStr('name'));
            $oUser->setLogin(getRequestStr('login'));
            $oUser->setEmailOrNumber(getRequestStr('email_or_number'));
            $oUser->setPassword(getRequestStr('pass'));
            $oUser->setId(ModuleRbac::ROLE_CODE_GUEST);
            $oUser->setDateRegister(date("Y-m-d H:i:s"));
            $oUser->setIpRegister(func_getIp());
            $oUser->setProfileSex('other');
            
            if (Config::Get('general.reg.activation') ) {
                $oUser->setActivate(0);
                $oUser->setActivateKey(md5(func_generator() . time()));
            } else {
                $oUser->setActivate(1);
                $oUser->setActivateKey(null);
            }
            
            $this->Hook_Run('registration_validate_before', array('oUser' => $oUser));
            
            $oUser->_setValidateScenario($aRegisterParams['validate_scenario']);
            
            $oUser->ymaps->setParam('validate_enable', $aRegisterParams['ymaps_validate_enable']);
            $oUser->category->setParam('validate_enable', $aRegisterParams['category_validate_enable']);
            
            if(!$oUser->_Validate()){
                $this->Hook_Run('registration_validate_after', array('oUser' => $oUser));
                foreach($oUser->_getValidateErrors() as $sError){
                    $this->Message_AddError(current($sError));
                }                
            }else{            
                $oUser->setPassword($this->User_MakeHashPassword($oUser->getPassword()));
                if ($this->User_Add($oUser)) {
                    $this->Hook_Run('registration_after', array('oUser' => $oUser));
                    
                    $oRole = $this->Rbac_GetRoleByCode($oUser->getRole());
                    $this->Rbac_AddRoleToUser($oRole, $oUser);
                    
                    $this->User_Update($oUser);
                    
                    $this->User_SetDefaultSettings($oUser);
                    
                    if ($sCode = $this->Session_Get('invite_code')) {
                        $this->Session_Drop('invite_code');
                        $this->Invite_UseCode($sCode, $oUser);
                    }
                    
                    $this->Stream_switchUserEventDefaultTypes($oUser->getId());
                    
                    if($aRegisterParams['ymaps_save_enable']){
                        $oUser->ymaps->CallbackAfterSave();
                    }
                    if($aRegisterParams['category_save_enable']){
                        
                        $oUser->category->CallbackAfterSave();
                    }
                    
                    if( $oGeoTarget = $oUser->getGeoTarget() ){
                        $oGeoTarget->setTargetId($oUser->getId());
                        $oGeoTarget->setTargetType('user');
                        $this->Geo_AddTarget($oGeoTarget);
                    }
                    
                    if($oUser->getNumber()){
                        if($iFieldId = $this->User_userFieldExistsByName('phone')){
                            $this->User_setUserFieldsValues($oUser->getId(),array($iFieldId[0]['id'] => $oUser->getNumber()));
                        }
                    }
                    if($oUser->getMail()){
                        if($iFieldId = $this->User_userFieldExistsByName('mail')){
                            $this->User_setUserFieldsValues($oUser->getId(),array($iFieldId[0]['id'] => $oUser->getMail()));
                        }
                    }                    
                    
                }
                $this->Session_Drop('userData');              //  print_r($oUser->_getData());
                Router::LocationAction('fauth/activation?user_id='.$oUser->getId());
            }
            
        }
       
        
        /*if($aUserData = $this->Session_Get('dataUser')){
            $aUserData->displayName = $this->PluginFreelancer_Freelancer_Rus2Translit($aUserData->displayName);
            $this->Viewer_Assign('aUserData',$aUserData );
        }*/
        //$this->Viewer_Assign('sUrlResetData', Router::GetPathWebCurrent().'?reset_data=1' );
        
        
    }
    
    public function EventActivation()             
    {
        $aRegisterParams = $this->Session_Get('aRegisterParams');
        
        $this->Hook_Run('registration_activate_before');
        
        $this->Session_Drop('aRegisterParams');
        
        if( !$oUser = $this->User_GetUserById(getRequest('user_id')) ){
            return Router::ActionError('',$this->Lang_Get('plugin.freelancer.register.validation.undefined_user'));
        }
        if(!$oUser->getActivate()){
            if(!$oUser->getActivate()){
                $this->PluginFreelancer_Notify_Send($oUser,'registration_activate', $oUser);   
            }
        }else{
            $this->User_Authorization($oUser);
            $this->Session_Drop('userId');
            Router::Location($oUser->getUserWebPath());
        }
        $this->Viewer_Assign('sEmail', $oUser->getMail());
        $this->Viewer_Assign('sNumber', $oUser->getNumber());
        $this->Component_Add('freelancer:register');
        
        $this->SetTemplateAction($aRegisterParams['activation_template']);
    }
}