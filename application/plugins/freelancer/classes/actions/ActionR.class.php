<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionR extends ActionPlugin{
    
    protected $oUserCurrent;
    
    protected function RegisterEvent() {
        
        $this->AddEventPreg('/^([0-9]+)/i','EventReferral');
        
    }

    public function Init() {
    }
    
    public function EventReferral(){
        if($oUser = $this->User_GetUserById($this->sCurrentEvent)){
            Router::LocationAction('auth/referral/'.$oUser->getReferralCode());
        }
        Router::Location(Router::GetPathRootWeb());
    }
    
    
}