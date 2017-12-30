<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionInfo extends ActionPlugin{
    
    protected $oUserCurrent;
    
    protected function RegisterEvent() {
        
        $this->AddEventPreg('/^([0-9]+)/i','/^response$/i','/^add$/i','/^([0-9]+)?/i','Response::EventAdd');
        $this->AddEventPreg('/^polz?/i','EventIndex');  
        $this->AddEventPreg('/^contact?/i','EventIndex');
        $this->AddEventPreg('/^reg?/i','EventIndex');
        $this->AddEventPreg('/^after_reg?/i','EventIndex');
        $this->AddEventPreg('/^employer?/i','EventIndex');
        $this->AddEventPreg('/^manager?/i','EventIndex'); 
        $this->AddEventPreg('/^master?/i','EventIndex');
        $this->AddEventPreg('/^index?/i','EventIndex');
        
        $this->AddEventPreg('/^oferta?/i','EventOferta');
    }

    public function Init() {
        $this->SetDefaultEvent('index');
        
    }
    
    public function EventIndex(){
        if(($sEvent = $this->sCurrentEvent) == 'index'){
            $sEvent = 'reg';
        }
        $this->Viewer_Assign('sMenuHeadItemSelect', 'info');
        $this->Viewer_Assign('sCurrentEvent', $sEvent);
        $this->SetTemplateAction('index');
    }
    public function EventOferta(){
        $this->SetTemplateAction('polz');
    }
}