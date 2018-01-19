<?php

class PluginYmaps_HookMain extends Hook
{
    
    public function RegisterHook()
    {
        $this->AddHook('template_form_settings_profile_geo', 'GeoWithGeokoder');
        $this->AddHook('action_event_settings_after', 'SettingsComponentAdd');
        //$this->AddHook('template_html_head_end', 'AddYmapScript');
    }
    
    public function SettingsComponentAdd($aParams) {
        $this->Component_Add('ymaps:geo');
        $this->Viewer_AssignJs('ymapsOptions', Config::Get('plugin.ymaps.options'));
    }
    
    public function AddYmapScript($aParams) {
        /*
         * Нужно ли загружать скрипты Яндекс карт
         */
        $aLoadYmapActions = Config::Get('plugin.ymaps.load_ymaps_actions');        
        if( in_array(Router::GetAction(), $aLoadYmapActions)){
            return '<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>';
        }
    }

    public function GeoWithGeokoder($aParams)
    {
        $oViewer = $this->Viewer_GetLocalViewer();
        $oViewer->Assign('label', 'География', true);
        return $oViewer->Fetch('component@ymaps:geo');
    }
}