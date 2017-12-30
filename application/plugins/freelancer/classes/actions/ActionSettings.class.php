<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionSettings extends PluginFreelancer_Inherit_ActionSettings{
    
    public function Init()
    {
        parent::Init();
        //$this->SetDefaultEvent('specialization');
        
    }
    protected function RegisterEvent() {
        parent::RegisterEvent();
        
        $this->RegisterEventExternal('FreelancerSettings','PluginFreelancer_ActionSettings_EventSpecialization');
        
        $this->AddEventPreg('/^specialization$/i','FreelancerSettings::EventSpecialization');
               
    }
    
}