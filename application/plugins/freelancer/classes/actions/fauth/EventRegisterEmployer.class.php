<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionFauth_EventRegisterEmployer extends Event {

    public function EventStep1() 
    {
        $this->User_Logout();
        $this->Component_Add('freelancer:register');
        $this->Session_Set('userData', ['role' => 'employer']);
        
        $this->Session_Set('aRegisterParams', [
            'validate_scenario' => 'register_employer_step1',
            'ymaps_validate_enable' => false,
            'category_validate_enable' => false,
            'ymaps_save_enable' => false,
            'category_save_enable' => false,
            'register_template' => 'register_employer/step1',
            'activation_template' => 'register_employer/step2'
        ]);         
        
        return Router::Action('fauth/register');
        
    }    
        
}