<?php

class PluginSmsc_ActionSend extends PluginAdmin_ActionPlugin
{

    public function Init()
    {
        $this->SetDefaultEvent('index');
    }

    /**
     * Регистрируем евенты
     *
     */
    protected function RegisterEvent()
    {
        $this->AddEvent('index', 'EventIndex');
        
    }

    /**
     *    Вывод списка страниц
     */
    protected function EventIndex()
    {
        echo 'send';
        
        $oSms = Engine::GetEntity('PluginSmsc_Sms_Sms');
        $oSms->setNumber('87054503719');
        $oSms->setMess('Проверка');
        print_r($oSms);echo '<br>';
        print_r($this->PluginSmsc_Sms_Send($oSms));echo '<br>';
        print_r($oSms);
        $oSms->Save();
    }

    
}