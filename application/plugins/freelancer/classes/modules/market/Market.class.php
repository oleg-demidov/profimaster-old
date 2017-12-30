<?php

class PluginFreelancer_ModuleMarket extends ModuleORM
{

    /**
     * Инизиализация модуля
     */
    public function Init()
    {
        parent::Init();
        
    }
    
    public function Exe($oPayment) {
        
        $sMethod = 'exe'.ucfirst($oPayment->getType());
        if(method_exists ( $this , $sMethod )){
            return call_user_func_array([$this, $sMethod], [$oPayment->getId()]);            
        }
    }
    
    public function exeRole($oPaymentId) {
        $oPayment = $this->PluginRobokassa_Payment_GetPaymentById($oPaymentId);

        if(!$oPayment->getState()){
            return false;
        }
        if(!$oUser = $this->User_GetUserById($oPayment->getUserId())){
            return false;
        }
        
        
        $oUse = $this->Invite_GetUseByFilter([
            'to_user_id' => $oPayment->getUserId(), 
            '#index-from' => 'from_user_id', 
            '#select' => 't.from_user_id']);
        $this->PluginFreelancer_Balance_Transaction(
                $oUse->getFromUserId(), 
                $oUser->getManagerProfit($oPayment->getSumm()),
                $oPayment->getComm());
        
        $oRole = $this->Rbac_GetRoleById($oPayment->getProductId());
        if(!$this->Rbac_AddRoleToUser($oRole, $oUser)){
            return false;
        }
        $oPayment->setState(2);
        return $oPayment->Save();
    }
    
    public function GetHtmlButton($sText) {
        $oViewer = $this->Viewer_GetLocalViewer();
        $oViewer->Assign('text', $sText, true);
        return $oViewer->Fetch('component@freelancer:market');
    }
}