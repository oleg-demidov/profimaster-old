<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionOrder extends ActionPlugin{
    
    protected $oUserCurrent;
    
    protected function RegisterEvent() {
        
        $this->RegisterEventExternal('OrderMaster','PluginFreelancer_ActionOrder_EventOrderMaster');
        
        $this->RegisterEventExternal('OrderComment','PluginFreelancer_ActionOrder_EventOrderComment');
        
        
        
        $this->RegisterEventExternal('OrderList','PluginFreelancer_ActionOrder_EventOrderList');
        
        $this->RegisterEventExternal('OrderComment','PluginFreelancer_ActionOrder_EventOrderComment');
        
        $this->RegisterEventExternal('OrderSearch','PluginFreelancer_ActionOrder_EventOrderSearch');
        
        $this->AddEventPreg('/^list/i','/^user/i','/^([0-9]+)/i','/^(page([0-9]+))?/i','OrderList::EventList');
        
        $this->AddEventPreg('/^add/i','/^master/i','/^(specialization)?$/i','OrderMaster::EventSpecialization');
        $this->AddEventPreg('/^add/i','/^master/i','/^about$/i','OrderMaster::EventAbout');
        $this->AddEventPreg('/^add/i','/^master/i','/^contacts$/i','OrderMaster::EventContacts');
        
        $this->RegisterEventExternal('Order','PluginFreelancer_ActionOrder_EventOrder');
        $this->AddEventPreg('/^(edit|add)/i','/^([0-9]+)?/i','Order::EventEdit');        
        $this->AddEventPreg('/^([0-9]+)/i', '/^choose_master$/i', '/^([0-9]+)?/i', 'Order::EventChoose');
        $this->AddEventPreg('/^([0-9]+)/i', '/^cancel_master?/i', 'Order::EventCancelMaster');
        $this->AddEventPreg('/^([0-9]+)/i', '/^accept_master?/i', ['Order::EventAcceptMaster','accept_master']); 
        $this->AddEventPreg('/^end/i','/^([0-9]+)/i','Order::EventEnd');
        $this->AddEventPreg('/^([0-9]+)/i',['Order::EventView','view']);  
        $this->AddEventPreg('/^remove/i','/^([0-9]+)/i','Order::EventRemove');
        $this->AddEventPreg('/^ajaxaddcomment$/i', 'OrderComment::AjaxAddComment');
        $this->AddEventPreg('/^ajaxresponsecomment$/i', 'OrderComment::AjaxResponseComment');
        
        $this->AddEventPreg('/^search$/i','/^(page([0-9]+))?/i','OrderSearch::EventSearch');
        
        $this->RegisterEventExternal('Bid','PluginFreelancer_ActionOrder_EventBid');
        $this->AddEventPreg('/^ajaxaddbid$/i', 'Bid::EventAjaxAdd');
        $this->AddEventPreg('/^ajaxeditbid$/i', 'Bid::EventAjaxEdit');
        $this->AddEventPreg('/^ajaxbidremove$/i', 'Bid::EventAjaxRemove');
        $this->AddEventPreg('/^ajaxbidform$/i', 'Bid::EventGetAjaxForm');
        $this->AddEventPreg('/^bid$/i', '/^ajaxedit$/i', 'Bid::AjaxEditBid');
    }

    public function Init() {
        $this->SetDefaultEvent('edit');
        $this->oUserCurrent =  $this->User_GetUserCurrent();        
    }
    
}