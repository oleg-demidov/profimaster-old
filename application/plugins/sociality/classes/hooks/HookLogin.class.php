<?php

class PluginSociality_HookLogin extends Hook
{

    public function RegisterHook()
    {
            $this->AddHook('template_form_login_begin', 'login_form_injection', __CLASS__);
            $this->AddHook('template_registration_end', 'login_form_injection', __CLASS__, 10);
            $this->AddHook('admin_delete_content_after', 'UserContentDelete', __CLASS__, 10);
    }

    public function login_form_injection()
    {
        $config = Config::Get('plugin.sociality.ha');
        
        $buttons = $this->getOrderButtons($config);
        
        $this->Viewer_Assign('sSizeButton', Config::Get('plugin.sociality.size'));
        
        $this->Viewer_Assign('sUriPluginSkin', $this->Component_GetWebPath('sociality:buts'));
        
        $this->Viewer_Assign('aButtonsNames', $buttons);
        
        return $this->Viewer_Fetch('component@sociality:buts');
    }
    
    /*
     *  Получить порядок кнопок для передачи в шаблон
     */    
    public function getOrderButtons(&$config)
    {
        
        $order = explode(',', Config::Get('plugin.sociality.order'));
        
        $order2 = array();
        
        for ($i=0; sizeof($order) > $i; $i++){
            $provider = trim($order[$i]);
            if(!isset($config['providers'][$provider]))
                continue;
            if($config['providers'][$provider]['enabled']){
                $order2[] = $provider;
            }
        }
        return $order2;
    }
    
    public function UserContentDelete(&$aParams) {
        $this->PluginSociality_Oauth_DeleteSocialByUserId($aParams['oUser']->getId());
    }
}