<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionPay_EventAction extends Event {
    
    public function Init() {
        $this->Viewer_SetResponseAjax('json');
    }

        
    public function EventAjaxAction() 
    {
        $this->SetTemplate(false);
        
        if(!$oAction = $this->PluginFreelancer_Market_GetActionById($this->GetParam(0))){
            $this->Message_AddError('Акция не найдена');
            return $this->EventAjaxMarket();                    
        }
        
        $oPaymentExist = $this->PluginRobokassa_Payment_GetPaymentByFilter([
            'user_id' => (int)$this->oUserCurrent->getId(),
            '#where' => ["t.method = 'action".$oAction->getId()."'" => []]
        ]);
                        
        $oViewerLocal = $this->Viewer_GetLocalViewer();
        $oViewerLocal->Assign('oAction', $oAction, true);
        $oViewerLocal->Assign('oUser', $this->oUserCurrent, true);
        $oViewerLocal->Assign('isActive', $oPaymentExist, true);
        $sHtml = $oViewerLocal->Fetch('component@freelancer:market.action');
        $this->Viewer_AssignAjax('html',$sHtml);
        
    }
    
    public function EventAjaxActionActive() 
    {
        if(!$oAction = $this->PluginFreelancer_Market_GetActionById($this->GetParam(1))){
            $this->Message_AddError('Акция не найдена');
            return $this->EventAjaxMarket();                    
        }
        
        $oPaymentExist = $this->PluginRobokassa_Payment_GetPaymentByFilter([
            'user_id' => (int)$this->oUserCurrent->getId(),
            '#where' => ["t.method = 'action".$oAction->getId()."'" => []]
        ]);
        if($oPaymentExist){
            $this->Message_AddError('Вы уже использовали акцию');
            return $this->EventAjaxMarket();
        }
        
        $oPayment = Engine::GetEntity('PluginRobokassa_Payment_Payment');
        $oPayment->setExpiration($oAction->getPeriod());
        $oPayment->setComm($oAction->getDesc());
        $oPayment->setUserId($this->oUserCurrent->getId());
        $oPayment->setSumm(0);
        $oPayment->setType('role');
        $oPayment->setState(1);
        $oPayment->setProductId($oAction->getRoleId());
        $oPayment->setDatePay(date('Y-m-d'));
        $oPayment->setMethod('action'.$oAction->getId());
        $oPayment->Save();
        
        if($this->PluginFreelancer_Market_Exe($oPayment)){
            $this->Logger_Notice('action');
            $oAction->setState(1);
            $this->Message_AddNotice('Роль активирована');
            $this->Logger_Notice('action2');
            return $this->EventAjaxAction();
        }
    }
}