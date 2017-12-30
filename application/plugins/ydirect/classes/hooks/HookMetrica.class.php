<?php

class PluginYdirect_HookMetrica extends Hook
{
    public function RegisterHook()
    {
        $this->AddHook('template_html_head_end', 'AddMetrica');
        
    }

    /**
     * Добавляем в главное меню админки свой раздел с подпунктами
     */
    public function AddMetrica()
    {
        return $this->Viewer_Fetch('component@ydirect:metrica');
    }
}