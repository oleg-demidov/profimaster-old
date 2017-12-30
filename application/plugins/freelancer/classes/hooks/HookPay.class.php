<?php

class PluginFreelancer_HookPay extends Hook
{
    /**
     * Регистрация необходимых хуков
     */
    public function RegisterHook()
    {
        
        $this->AddHook('robokassa_pay', 'InitRobokassaPay');
        
    }

    
    public function InitRobokassaPay($aParams)
    {
        $this->PluginFreelancer_Market_Exe($aParams['payment']);
    }

    
}