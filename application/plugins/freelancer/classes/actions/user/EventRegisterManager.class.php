<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionUser_EventRegisterManager extends Event {

    public function EventReg() 
    {
        if(getRequest('reset_data')){
            $this->Session_Drop('dataUser');
            Router::LocationAction('user/register_manager/reg');
        }
        
        $this->Session_Set('master_reg',1);
        $this->Session_Set('role','manager');
                
        if(isPost()){  
            if(!getRequest('g-recaptcha-response')){
                $this->Message_AddError('Нажмите Я не робот','Ошибка каптчи',true);
                Router::Location(Router::GetPathWebCurrent());
            }
            if($oUser = $this->User_AddUser('manager')){
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
        
        $this->SetTemplateAction('register_manager/reg');        
        
    }
    
    public function EventActivation() 
    {
        $oUser = Engine::GetEntity('User_User', $this->Session_Get('oUserData'));
        if (Config::Get('general.reg.activation')){
            $this->PluginFreelancer_Notify_Send($oUser,'registration_activate', $oUser);
            
        }
        $this->Viewer_Assign('sEmail', $oUser->getMail());
        $this->Viewer_Assign('sNumber', $oUser->getNumber());
        $this->Component_Add('freelancer:register');
        $this->SetTemplateAction('register_manager/activation');
    }
}