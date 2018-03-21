<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionUser extends ActionPlugin{
    
    protected $oUserCurrent;
    
    public $oUser;
    
    private $sHtmlDescription = '';
    
    private $sHtmlTitle = '';
    
    private $sHtmlKeywords = '';
    
    protected function RegisterEvent() {
        
        
        $this->RegisterEventExternal('Portfolio','PluginFreelancer_ActionUser_EventPortfolio');
        $this->AddEventPreg('/^[0-9]+/i','/^portfolio$/i','/^add/i','Portfolio::EventAdd');        
        $this->AddEventPreg('/^[0-9]+/i','/^portfolio$/i','/^add/i','Portfolio::EventEdit');
        
        $this->RegisterEventExternal('Search','PluginFreelancer_ActionUser_EventSearch');
        $this->AddEventPreg('/^search$/i','/^(page([0-9]+))?/i','Search::EventSearch'); 
        
        $this->RegisterEventExternal('Register','PluginFreelancer_ActionUser_EventRegister');
        $this->AddEventPreg('/^register/i','/^reg/i','Register::EventReg');
        $this->AddEventPreg('/^activation/i','/^activation/i','Register::EventActivation');
        
        $this->RegisterEventExternal('RegisterMaster','PluginFreelancer_ActionUser_EventRegisterMaster');
        $this->AddEventPreg('/^register_master/i','/^step1/i','RegisterMaster::EventStep1');
        $this->AddEventPreg('/^register_master/i','/^step2/i','RegisterMaster::EventStep2');
        $this->AddEventPreg('/^register_master/i','/^reg/i','RegisterMaster::EventStep3');
        $this->AddEventPreg('/^register_master/i','/^activation/i','RegisterMaster::EventStep4');
        
        $this->RegisterEventExternal('RegisterManager','PluginFreelancer_ActionUser_EventRegisterManager');
        $this->AddEventPreg('/^register_manager/i','/^reg/i','RegisterManager::EventReg');
        $this->AddEventPreg('/^register_manager/i','/^activation/i','RegisterManager::EventActivation');
        
        $this->RegisterEventExternal('RegisterEmployer','PluginFreelancer_ActionUser_EventRegisterEmployer');
        $this->AddEventPreg('/^register_employer/i','/^(reg|step1)/i','RegisterEmployer::EventStep1');
        $this->AddEventPreg('/^register_employer/i','/^activation/i','RegisterEmployer::EventStep2');
        
        $this->AddEventPreg('/^register_role/i','EventRegisterRole');
        
        $this->RegisterEventExternal('Profile','PluginFreelancer_ActionUser_EventProfile');
        $this->AddEventPreg('/^([0-9]+|[a-zA-Z0-9_]{1,50})/i','/^(about)?$/i', array('Profile::EventAbout', 'profile'));
        $this->AddEventPreg('/^([0-9]+|[a-zA-Z0-9_]{1,50})/i','/^(responses)?$/i','/^(page([0-9]+))?/i', array('Profile::EventResponses', 'profile'));
        $this->AddEventPreg('/^([0-9]+|[a-zA-Z0-9_]{1,50})/i','/^orders$/i','/^(page([0-9]+))?/i', array('Profile::EventOrders', 'profile'));
        $this->AddEventPreg('/^([0-9]+|[a-zA-Z0-9_]{1,50})/i','/^portfolio$/i','/^(page([0-9]+))?/i', array('Profile::EventPortfolio', 'profile'));
        
    }

    public function Init() {
        $this->SetDefaultEvent('profile');
        $this->oUserCurrent =  $this->User_GetUserCurrent();
        
    }
    
    public function EventRegisterRole() {
        Router::LocationAction('user/register_'.getRequest('role', 'master').'/step1');
    }
    
    public function EventShutdown()
    {
              
       
    }
}