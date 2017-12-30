<?php

class PluginFreelancer_HookItemsSettings extends Hook
{

    public function RegisterHook()
    {
            $this->AddHook('template_nav_settings', 'ItemsSettings' ,__CLASS__);
            $this->AddHook('settings_tuning_save_after', 'NoticeSettings' ,__CLASS__);
            $this->AddHook('settings_profile_save_before', 'RatingSave' ,__CLASS__);
            $this->AddHook('action_event_settings_after', 'ComponentAddTuning');
    }
    
    public function ComponentAddTuning($aParams) {
        $this->Component_Add('freelancer:tuning');
    }
    
    public function ItemsSettings($aParams){
        
        if(!$this->Rbac_IsAllow('specialization', 'freelancer',[ 'count' => 1])){
            return ;
        }
        $aItem = [array_shift($aParams['items'])];
        $aNewItems = [
            [ 
                'url' => Router::GetPath('settings/specialization'), 
                'text' => $this->Lang_Get('plugin.freelancer.text.specialization'), 
                'name' => 'specialization' ]
            
        ];
        
        return array_merge(array_merge($aItem, $aNewItems), $aParams['items']);
    }
    
    public function NoticeSettings($aParams) {
        $aParams['oUser']->setSettings('notify_email_topic', getRequest('settings_notice_new_topic') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_email_comment', getRequest('settings_notice_new_comment') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_email_talk', getRequest('settings_notice_new_talk') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_email_reply_comment', getRequest('settings_notice_reply_comment') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_email_new_friend', getRequest('settings_notice_new_friend') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_email_order', getRequest('notify_email_order') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_email_order_start', getRequest('notify_email_order_start') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_email_orders', getRequest('notify_email_orders') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_email_response', getRequest('notify_email_response') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_email_bid', getRequest('notify_email_bid') ? 1 : 0);
        
        $aParams['oUser']->setSettings('notify_sms_talk', getRequest('sms_notify_talk') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_sms_order', getRequest('notify_sms_order') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_sms_order_start', getRequest('notify_sms_order_start') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_sms_orders', getRequest('notify_sms_orders') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_sms_response', getRequest('notify_sms_response') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_sms_bid', getRequest('notify_sms_bid') ? 1 : 0);
        
        $aParams['oUser']->setSettings('notify_panel_talk', getRequest('panel_notify_talk') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_panel_order', getRequest('notify_panel_order') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_panel_order_start', getRequest('notify_panel_order_start') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_panel_orders', getRequest('notify_panel_orders') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_panel_response', getRequest('notify_panel_response') ? 1 : 0);
        $aParams['oUser']->setSettings('notify_panel_bid', getRequest('notify_panel_bid') ? 1 : 0);
    }
    
    public function RatingSave($aParams) {
        $aParams['oUser']->_setValidateScenario('profile');
        $aParams['oUser']->_Validate();        
    }
}