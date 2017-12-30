<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionManager extends ActionPlugin{
    
    protected $oUserCurrent;
    
    public $oUser;
    
    protected function RegisterEvent() {
        
        
        $this->RegisterEventExternal('Profile','PluginFreelancer_ActionManager_EventProfile');
        $this->AddEventPreg('/^([0-9]+|[a-zA-Z0-9_]{1,50})/i','/^(invites)?$/i', '/^(page([0-9]+))?/i', array('Profile::EventInvites', 'profile'));
        //$this->AddEventPreg('/^([0-9]+|[a-zA-Z0-9_]{1,50})/i','/^(responses)?$/i','/^(page([0-9]+))?/i', array('Profile::EventResponses', 'profile'));
        $this->AddEventPreg('/^([0-9]+|[a-zA-Z0-9_]{1,50})/i','/^payments$/i','/^(page([0-9]+))?/i', array('Profile::EventPayments', 'profile'));
        $this->AddEventPreg('/^([0-9]+|[a-zA-Z0-9_]{1,50})/i','/^transactions$/i','/^(page([0-9]+))?/i', array('Profile::EventTransactions', 'profile'));
          
    }

    public function Init() {
        $this->SetDefaultEvent('invites');
        $this->oUserCurrent =  $this->User_GetUserCurrent();    
    }    
    
    public function EventShutdown() {
        $this->Viewer_Assign('oUserProfile', $this->oUser);
    }
}