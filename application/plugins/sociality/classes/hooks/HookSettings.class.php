<?php

class PluginSociality_HookSettings extends Hook
{

    public function RegisterHook()
    {
            $this->AddHook('template_user_settings_profile_end', 'SettingsForm', __CLASS__);
            
    }

    public function SettingsForm()
    {
        if(!$oUserCurrent = $this->User_GetUserCurrent()){
            return;
        }
        $aSocials = $this->PluginSociality_Oauth_GetSocialItemsByUserId($oUserCurrent->getId());
        
        $this->Viewer_Assign('aSocials', $aSocials,true);
        
        $buttons = $this->PluginSociality_Oauth_GetOrderButtons();
        
        $this->Viewer_Assign('sSizeButton', Config::Get('plugin.sociality.size'));
        
        $this->Viewer_Assign('sUriPluginSkin', $this->Component_GetWebPath('sociality:buts'));
        
        $this->Viewer_Assign('aButtonsNames', $buttons);
        
        return $this->Viewer_Fetch('component@sociality:binds');
    }
    
}