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
        //$this->AddEventPreg('/^test/i','EventTest');
    }

    public function Init() {
        $this->SetDefaultEvent('index');
        $this->oUserCurrent =  $this->User_GetUserCurrent();             
    }
    
    public function EventIndex(){
        $this->Component_Add('freelancer:banner');
        $this->Component_Add('freelancer:specialization-tabs');
        $this->Component_Add('freelancer:category-tabs');
        $this->Component_Add('freelancer:user');
        $this->Component_Add('freelancer:portfolio');
        $this->Component_Add('freelancer:master');
        
        $oBehavior = Engine::GetEntity('User_User')->GetBehavior('category');  
        if ($oType = $this->Category_GetTypeByTargetType($oBehavior->getCategoryTargetType())) {
            $aCategories = $this->Category_LoadTreeOfCategory(array('type_id' => $oType->getId()));
        }
        $this->Viewer_Assign('aCategories', $aCategories);
        
        $this->Viewer_Assign('action', Router::GetPath('order/search'));
        
        $this->Viewer_SetHtmlDescription( 'Лучшие мастера Казахстана ждут ваших заказов' );
        
        $this->Viewer_SetHtmlKeywords('мастера казахстан');
        
        $this->Viewer_AddHtmlTitle('Мастера Казахстана');
    }
    
    public function EventTest(){
    
        /*$oGeos = $this->Geo_GetCities(['name_en' => '', 'country_id' => 80], [], 1, 500);
        foreach($oGeos['collection'] as &$oGeo){
            $oGeo->setNameEn($this->Text_Transliteration($oGeo->getNameRu(), false));
            $this->Geo_UpdateGeo($oGeo);
        }*/
        /*$iCount = 0;
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
        }*/
        
        $aTargets = $this->PluginYdirect_Geo_GetTargetItemsByFilter([
            'target_type' => 'user',
            '#select' => ['t.target_type','t.target_id', 'g.geo_region_type', 'g.geo_old'],
            '#join' => ['join pm_ydirect_geo as g on g.id = t.geo_id']
        ]); 
        $aTransType = [
            'City' => 'city',
            'Country' => 'country',
            'Administrative area' => 'region'
        ];
        foreach($aTargets as $oTarget){
            $oTarget->_setData(['type' => $aTransType[$oTarget->getGeoRegionType()]]);
            $oGeoObject = $this->Geo_GetGeoObject($oTarget->getType(), $oTarget->getGeoOld());
            $this->Geo_CreateTarget($oGeoObject, $oTarget->getTargetType(), $oTarget->getTargetId());
            print_r($oTarget->_getData());echo '<br>';
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