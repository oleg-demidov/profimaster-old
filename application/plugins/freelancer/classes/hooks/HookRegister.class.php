<?php

class PluginFreelancer_HookRegister extends Hook
{
   
    public function RegisterHook()
    {
        $this->AddHook('sociality_register_begin', 'SocialityRegisterBegin', null, 500);
        $this->AddHook('viewer_init_assign', 'AssignRequest', __CLASS__);
    }
    
    public function SocialityRegisterBegin($aParams)
    {
        if(!$aDataUser = $this->Session_Get('userData')){
            return false;
        }
        
        if($aDataUser['role'] == 'master'){
            
            $aParams['sUrlRedirect'] = 'fauth/register_master/step3';
            
        }elseif($aDataUser['role'] == 'employer'){
            
             $aParams['sUrlRedirect'] = 'fauth/register_employer/step1';
             
        }else{
            return false;
        }
    }

    public function AssignRequest($param) {
        if(!$oProfileData = $this->Session_Get('oUserProfile')){
            return false;
        }
        $_REQUEST['email_or_number'] = $oProfileData->email;
    }
}