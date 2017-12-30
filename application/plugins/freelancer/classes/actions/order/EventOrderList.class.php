<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionOrder_EventOrderList extends Event {

    public function EventList() 
    {
        $iPage =   $this->GetParamEventMatch(2,2)?$this->GetParamEventMatch(2,2):1;
        $this->Component_Add('freelancer:order'); echo $iPage;
        $iUserId =  $this->GetParam(1);
        $aFilter = [
            'user_id' => $iUserId,
            '#page' => [$iPage, 10]
        ];
        if($this->oUserCurrent->getId() != $iUserId and !$this->oUserCurrent->isAdministrator()){
            $aFilter['status'] = 'publish';
        }
        $aOrders = $this->PluginFreelancer_Order_GetOrderItemsByFilter($aFilter);
        $this->Viewer_Assign('aOrders', $aOrders['collection']);
        $aPaging = $this->Viewer_MakePaging($aOrders['count'], $iPage, 10, 5, Router::GetPath('order/list/user').$iUserId);
        $this->Viewer_Assign('aPaging', $aPaging);
    } 
    
}