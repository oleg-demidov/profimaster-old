<?php

class PluginFreelancer_HookJivosite extends Hook
{

    public function RegisterHook()
    {
            //$this->AddHook('template_html_head_end', 'Jovosite' ,__CLASS__);
    }
    
    public function Jovosite()
    {
        return $this->Viewer_Fetch('component@freelancer:jivosite');
    }
    
}