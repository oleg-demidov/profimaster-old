<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionFreelancer extends ActionPlugin{
    
    protected $oUserCurrent;
    
    protected function RegisterEvent() {
        
        $this->RegisterEventExternal('Response','PluginFreelancer_ActionFreelancer_EventResponse');
        $this->AddEventPreg('/^([0-9]+)/i','/^response$/i','/^add$/i','/^([0-9]+)?/i','Response::EventAdd');
        $this->AddEventPreg('/^response$/i','/^edit$/i','/^([0-9]+)?/i','Response::EventEdit');
        $this->AddEventPreg('/^response$/i','/^remove$/i','/^([0-9]+)?/i','Response::EventRemove');
                
        $this->RegisterEventExternal('Ajax','PluginFreelancer_ActionFreelancer_EventAjax');       
        $this->AddEventPreg('/^ajax$/i','/^media$/i','/^submit-insert$/i','Ajax::EventMediaSubmitInsert');
        $this->AddEventPreg('/^ajax$/i','/^media$/i','/^upload-link$/i','Ajax::EventMediaUploadLink');
        $this->AddEventPreg('/^ajax$/i','/^user$/i','/^phone$/i','Ajax::EventUserPhone');
        
        $this->RegisterEventExternal('AjaxFavourite','PluginFreelancer_ActionFreelancer_EventAjaxFavourite');
        $this->AddEventPreg('/^ajax$/i','/^favourite$/i','/^toggle$/i','AjaxFavourite::EventToggle');
        
        $this->RegisterEventExternal('AjaxNotify','PluginFreelancer_ActionFreelancer_EventAjaxNotify');
        $this->AddEventPreg('/^ajax$/i','/^notify$/i','/^$/i','AjaxNotify::EventList');
        $this->AddEventPreg('/^ajax$/i','/^notify$/i','/^hide$/i','AjaxNotify::EventHide');
        
        $this->RegisterEventExternal('AjaxAuth','PluginFreelancer_ActionFreelancer_EventAjaxAuth');
        $this->AddEventPreg('/^ajax-validate-email-or-number$/i','AjaxAuth::EventValidateEmailOrNumber');
        $this->AddEventPreg('/^ajax-generate-login$/i','AjaxAuth::EventAjaxGenerateLogin');
        
        $this->RegisterEventExternal('AjaxNumber','PluginFreelancer_ActionFreelancer_EventAjaxNumber');
        $this->AddEventPreg('/^ajax-valid-number$/i','AjaxNumber::EventValidateNumber');
        $this->AddEventPreg('/^ajax-valid-number-kod$/i','AjaxNumber::EventValidateNumberKod');
        
        $this->AddEventPreg('/^index?/i','EventIndex');
                
        //$this->AddEventPreg('/^email?/i','EventEmail');
        //$this->AddEventPreg('/^test?/i','EventTest');
    }

    public function Init() {
        $this->SetDefaultEvent('index');
        $this->oUserCurrent =  $this->User_GetUserCurrent();             
    }
    
    public function EventIndex(){
        $this->Component_Add('freelancer:banner');
        $this->Component_Add('freelancer:specialization-tabs');
        $this->Component_Add('freelancer:user');
        $this->Component_Add('freelancer:portfolio');
        $this->Component_Add('freelancer:master');
        $this->Viewer_Assign('action', Router::GetPath('order/search'));
        
        $this->Viewer_SetHtmlDescription( 'Лучшие мастера Казахстана ждут ваших заказов' );
        
        $this->Viewer_SetHtmlKeywords('мастера казахстан');
        
        $this->Viewer_AddHtmlTitle('Мастера Казахстана');
    }
    
    public function EventTest(){
        $iCount = 0;echo 22;
        $aSpecTargets = $this->Category_GetTargetItemsByFilter([
            'target_id' => $this->oUserCurrent->getId(),
            'object_type' => 'user',
            'target_type' => 'specialization',
            '#order' => ['date_create' => 'ASC'],
            '#limit' => [1,500]
        ]);
        print_r($aSpecTargets);
        foreach ($aSpecTargets as $oSpecTarget) {
            $oSpecTarget->Delete();
        }
    }
    
    public function EventEmail() {
        $aOrders = $this->PluginFreelancer_Order_GetOrderItemsAll();
        $this->Viewer_Assign('oOrder', $aOrders[0]);
        $this->Viewer_Assign('aOrders', $aOrders);
        
        $oResponse = $this->PluginFreelancer_Freelancer_GetResponseItemsAll();
        $this->Viewer_Assign('oResponse', $oResponse[0]);
        
        $this->Viewer_Assign('oUserCurrent', $this->oUserCurrent);
    }
    
}