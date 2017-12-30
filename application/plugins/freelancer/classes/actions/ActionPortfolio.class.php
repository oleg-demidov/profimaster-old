<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionPortfolio extends ActionPlugin{
    
    protected $oUserCurrent;
    
    protected function RegisterEvent() {
       
        $this->RegisterEventExternal('Work','PluginFreelancer_ActionPortfolio_EventWork');
        $this->AddEventPreg('/^work$/i','/^(add|edit)/i','/^([0-9]+)?/i','Work::EventEdit');        
        $this->AddEventPreg('/^work$/i','/^remove/i','/^([0-9]+)/i','Work::EventDelete');
        
    }

    public function Init() {
        //$this->SetDefaultEvent('edit');
        $this->oUserCurrent =  $this->User_GetUserCurrent();             
    }
}