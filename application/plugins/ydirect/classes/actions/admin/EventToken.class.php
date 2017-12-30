<?php

class PluginYdirect_ActionAdmin_EventToken extends Event
{



    /**
     * Обработка добавления страницы
     */
    public function EventGo()
    {
        $dataQuery = [
            'response_type' => 'code',
            'client_id' => Config::Get('plugin.ydirect.app.id')
        ];
        Router::Location(Config::Get('plugin.ydirect.redirect_oauth').'?'.http_build_query($dataQuery));
    }
    
    
    public function EventCode()
    {
        $this->PluginYdirect_Ydirect_ResponseOauth(getRequest('code'));
        $this->SetTemplate(false);        
    }
    
}