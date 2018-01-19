<?php

class PluginYmaps_ActionYmaps extends ActionPlugin
{

    
    public $oUserCurrent;

    public function Init()
    {
        $this->oUserCurrent = $this->User_GetUserCurrent();
    }

    /**
     * Регистрируем евенты
     *
     */
    protected function RegisterEvent()
    {
        $this->AddEventPreg('/^ajax-list$/i', 'EventAjaxList');
    }

    /**
     *    Вывод списка страниц
     */
    protected function EventAjaxList()
    {
        $this->Viewer_SetResponseAjax('json');
        
        $oViewer = $this->Viewer_GetLocalViewer();
        
        $aGeos = json_decode(urldecode(getRequest('data')));
        
        $aItems = [];
        foreach($aGeos as $iKey=>$aGeo){
            $aItems[] = ['text' => "<span class='primary-text'>".$aGeo->name."</span>, ".join(", ",$aGeo->loc), 'attributes' => ['data-index' => $iKey]];
        }

        $oViewer->Assign('items', $aItems, true);
        
        $this->Viewer_AssignAjax('sHtml', $oViewer->Fetch("component@dropdown.menu") );
    }
}