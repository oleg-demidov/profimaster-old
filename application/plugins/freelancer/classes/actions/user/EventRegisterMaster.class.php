<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionUser_EventRegisterMaster extends Event {

    public function EventStep1() 
    {
        $this->Session_Drop('dataUser');
        $this->User_Logout();
        $this->Session_Set('role','master');
        if(isPost()){
            $aSpecialization = getRequest('specialization');
            if(!sizeof($aSpecialization)){
                $this->Message_AddError('Выберете одну специальзацию');
            }elseif(sizeof($aSpecialization) > 1){
                $this->Message_AddError('Вы можете выбрать только одну специальзацию');
            }else{
                $this->Session_Set('specialization',$aSpecialization);
                
                Router::LocationAction('user/register_master/step2');
            }
        }
        
        $this->Component_Add('freelancer:register');
        $this->SetTemplateAction('register_master/step1');
    }
    
    public function EventStep2() 
    {
        if(isPost()){ 
            $sAbout = getRequest('about');
            $oUser= Engine::GetEntity('User_User');
            $oUser->setProfileAbout($sAbout);
            $oUser->_setValidateScenario('profile_about');
            
            if(!$oUser->_Validate()){
                $this->Message_AddError($oUser->_getValidateError('profile_about'));
            }else{
                $this->Session_Set('about',$sAbout);
                $this->Session_Set('rating_offset', $oUser->_getDataOne('rating_offset'));
                $this->Session_Set('ygeo',getRequest('ygeo'));
                Router::LocationAction('user/register_master/reg');
            }
        }
        $this->Component_Add('freelancer:register');
        $this->SetTemplateAction('register_master/step2');
    }
    
    public function EventStep3() 
    {
        if(getRequest('reset_data')){
            $this->Session_Drop('dataUser');
            Router::LocationAction('user/register_master/reg');
        }
        
        $this->Session_Set('master_reg',1);
        if(isPost()){  
            if(!getRequest('g-recaptcha-response')){
                $this->Message_AddError('Нажмите Я не робот','Ошибка каптчи',true);
                Router::Location(Router::GetPathWebCurrent());
            }
            if($oUser = $this->User_AddUser('master')){
                if($this->User_AddSocial($oUser)){
                    $this->User_Authorization($oUser, false);
                    Router::Location($oUser->getUserWebPath());
                }
                $this->Session_Set('oUserData', $oUser->_getData());
                Router::LocationAction('user/register_'.$oUser->getRole().'/activation');
            }
        }
        $this->Component_Add('freelancer:register');
        
        if($aUserData = $this->Session_Get('dataUser')){
            $aUserData->displayName = $this->PluginFreelancer_Freelancer_Rus2Translit($aUserData->displayName);
            $this->Viewer_Assign('aUserData',$aUserData );
        }
        $this->Viewer_Assign('sUrlResetData', Router::GetPathWebCurrent().'?reset_data=1' );
        
        $this->SetTemplateAction('register_master/step3');
    }
    
    public function EventStep4() 
    {
        $oUser = Engine::GetEntity('User_User', $this->Session_Get('oUserData'));
        if (Config::Get('general.reg.activation')){
            $this->PluginFreelancer_Notify_Send($oUser,'registration_activate', $oUser);
            
        }
        $this->Viewer_Assign('sEmail', $oUser->getMail());
        $this->Viewer_Assign('sNumber', $oUser->getNumber());
        $this->Component_Add('freelancer:register');
        $this->SetTemplateAction('register_master/step4');
    }
}