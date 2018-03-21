<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionFreelancer_EventAjaxAuth extends Event {
    
     public function Init()
    {
         $this->Viewer_SetResponseAjax('json');
    }

    public function EventValidateEmailOrNumber()
    {
        $oUser = Engine::GetEntity('ModuleUser_EntityUser');
        $oUser->_setValidateScenario('email_or_number');
        $oUser->setEmailOrNumber(getRequest('email_or_number'));
        
        $aBehaviors = $oUser->GetBehaviors();
        foreach(array_keys($aBehaviors) as $aBehaviorKey){
            $oUser->DetachBehavior($aBehaviorKey);
        }
        
        $oUser->_Validate();
        if ($oUser->_hasValidateErrors()) { 
            /**
             * Получаем ошибки
             */
            $this->Viewer_AssignAjax('errors', $oUser->_getValidateErrors());
        }
    }
    
    public function EventAjaxGenerateLogin() {
        //$this->Logger_Notice(getRequest('name'));
        if($sName = getRequest('name')){
            $sLogin = $this->PluginFreelancer_Freelancer_Rus2Translit($sName);
            $oUser = Engine::GetEntity('ModuleUser_EntityUser');
            $oUser->_setValidateScenario('login_exist');
            $oUser->setLogin($sLogin);
            while(!$oUser->_Validate()){
                $oUser->setLogin($sLogin . rand(1, 99));
            }
            $this->Viewer_AssignAjax('login', $oUser->getLogin());
        }
    }
}