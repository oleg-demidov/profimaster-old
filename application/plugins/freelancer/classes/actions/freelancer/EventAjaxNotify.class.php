<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionFreelancer_EventAjaxNotify extends Event {
    
    public function Init()
    {
        
         $this->Viewer_SetResponseAjax('json');
    }

    public function EventList()
    {
        $mLimit = getRequest('limit', 5);
        $aNotify = $this->PluginFreelancer_Notify_GetNew($mLimit);
        $oViewerLocal = $this->Viewer_GetLocalViewer();
        $oViewerLocal->Assign('aNotify',$aNotify, true);
        $this->Viewer_AssignAjax('sNotify', $oViewerLocal->Fetch('component@freelancer:notify.list'));
        $this->Viewer_AssignAjax('iCount', $this->PluginFreelancer_Notify_GetCount());       
        
    }   
    
    public function EventHide()
    {
        $oNotify = $this->PluginFreelancer_Notify_GetNotifyById(getRequest('iNotifyId'));
        $oNotify->setStatus('read');
        $this->Viewer_AssignAjax('iRes', (bool)$oNotify->Save());       
        $this->Viewer_AssignAjax('iCount', $this->PluginFreelancer_Notify_GetCount());
    } 
}