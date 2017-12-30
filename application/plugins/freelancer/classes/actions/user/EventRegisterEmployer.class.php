<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionUser_EventRegisterEmployer extends Event {

    public function EventStep1() 
    {
        $this->Session_Set('role','employer');
        $this->Session_Set('master_reg',1);
        $this->User_Logout();
        
        if(isPost()){            
            if($oUser = $this->User_AddUser('employer')){
                if($this->User_AddSocial($oUser)){
                    $this->User_Authorization($oUser, false);
                    Router::Location($oUser->getUserWebPath());
                }
                $this->Session_Set('oUserData', $oUser->_getData());
                Router::LocationAction('user/register_'.$oUser->getRole().'/activation');
            }           
            
        }
        
        if($aUserData = $this->Session_Get('dataUser')){
            $aUserData->displayName = $this->PluginFreelancer_Freelancer_Rus2Translit($aUserData->displayName);
            $this->Viewer_Assign('aUserData',$aUserData );
        }
        
        $this->Component_Add('sociality:buts');
        $this->Component_Add('freelancer:register');
        $this->SetTemplateAction('register_employer/step1');
    }
    
        
    public function EventStep2() 
    {
        $oUser = Engine::GetEntity('User_User', $this->Session_Get('oUserData'));
        if (Config::Get('general.reg.activation')){
            $this->PluginFreelancer_Notify_Send($oUser,'registration_activate', $oUser);
        }
        $this->Viewer_Assign('sEmail', $oUser->getMail());
        $this->Viewer_Assign('sNumber', $oUser->getNumber());
        $this->Component_Add('freelancer:register');
        $this->SetTemplateAction('register_employer/step4');
    }
}