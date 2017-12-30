<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionPay_EventMarket extends Event {
    
    public function Init() {
        
    }

    public function EventAjaxMarket() 
    {
        $this->Viewer_SetResponseAjax('json');
        
        $oViewerLocal = $this->Viewer_GetLocalViewer();

        if(getRequest('sTargetType') == 'permission'){
            return $this->EventAjaxPermission(getRequest('sTargetId'));
        }
        if(getRequest('sTargetType') == 'role'){
            return $this->EventAjaxRoleForm(getRequest('sTargetId'));
        }
        
        $sTablePayment = MapperORM::GetTableName(Engine::GetEntity('PluginRobokassa_Payment_Payment'));
        $aUserActions = $this->PluginFreelancer_Market_GetActionItemsByFilter([
            '#index-from' => 'role_id',
            '#join' => ['JOIN '.$sTablePayment.' as p ON SUBSTRING(p.method,7) = t.id '],
            '#where' => ["p.user_id = ?d" => [$this->oUserCurrent->getId()]]
        ]);
        
        if(!$this->oUserCurrent){
            $oViewerLocal->Assign('url', Router::GetPath('auth/login'), true);
            $oViewerLocal->Assign('text','Необходимо выполнить вход',true);
            $sHtml = $oViewerLocal->Fetch('component@freelancer:market.error');
            $this->Viewer_AssignAjax('html', $sHtml);
            return;
        }
        if(!$sUserRole = $this->oUserCurrent->getStrRole()){
            return;
        }
        
        $aRoles = $this->Rbac_GetRoleItemsByFilter([
            '#where' => ['t.code=? or t.code=?' => [ $sUserRole.'_pro', $sUserRole.'_profi']]]);
        
        $aActions = $this->PluginFreelancer_Market_GetActionItemsByFilter([
            '#index-from' => 'role_id',
            '#where' => ['t.date_start < NOW() AND t.date_end > NOW() and t.state = ?d' => [1]]
        ]);
        
        $this->Logger_Notice(serialize($aActions));
        
        $oViewerLocal->Assign('aUserActions', $aUserActions);
        $oViewerLocal->Assign('aActions', $aActions);        
        $oViewerLocal->Assign('aRoles', $aRoles, true);
        $sHtml = $oViewerLocal->Fetch('component@freelancer:market.index');
        $this->Viewer_AssignAjax('html', $sHtml);
    }
    
    public function EventAjaxPermission($iId = null) {
        $oRole = $this->GetRoleByPermissionId($iId?$iId:$this->GetParam(0));
        return $this->ViewAjaxPayment($oRole);
    }
    
     public function EventAjaxRoleForm($iId = null) {
        $mRole = $iId?$iId:$this->GetParam(0);
        $oRole = $this->Rbac_GetRoleByFilter(['#where' => ['t.id = ? or t.code = ?' => [$mRole,$mRole]]]);
        $iCount = $this->GetParam(2);
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        if(!$oRole){
            $this->Message_AddError('Роль не найдена');
            return false;
        }
        $oViewerLocal = $this->Viewer_GetLocalViewer();
        $oViewerLocal->Assign('oRole', $oRole, true);
        $oViewerLocal->Assign('iCount', ($this->GetParam(1)?$this->GetParam(1):1), true);
        $sHtml = $oViewerLocal->Fetch('component@freelancer:market.form');
        $this->Viewer_AssignAjax('html',$sHtml);
    }
    
    
    public function EventAjaxRole($iId = null) {
        $oRole = $this->Rbac_GetRoleById($iId?$iId:$this->GetParam(0));
        return $this->ViewAjaxPayment($oRole);
    }
    
    public function EventAjaxPayment() {
        $oRole = $this->Rbac_GetRoleById(getRequest('role-id'));
        return $this->ViewAjaxPayment($oRole);
    }
    
    public function ViewAjaxPayment($oRole) {
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        if(!$oRole){
            $this->Message_AddError('Роль не найдена');
            return false;
        }
        $iDaysExpiration = getRequest('count-days', 1);
        
        $oViewerLocal = $this->Viewer_GetLocalViewer();
        if(!is_object($oPayment = $this->GetPayment($oRole, $iDaysExpiration))){
            $this->Message_AddError($oPayment);
            return false;
        }
        $oViewerLocal->Assign('oPayment', $oPayment, true);
        $sHtml = $oViewerLocal->Fetch('component@robokassa:payment');
        $this->Viewer_AssignAjax('html',$sHtml);
        return true;
    }
    
    public function EventPermission() 
    {
        $oRole = $this->GetRoleByPermissionId($this->GetParam(0));
        
        if(!$oRole){
            return Router::ActionError('Роль не найдена');
        }
        
        if(!is_object($oPayment = $this->GetPayment($oRole))){
            return Router::ActionError($oPayment);
        }
        $this->Viewer_Assign('oPayment', $oPayment);
        $this->SetTemplateAction('payment');                
    }
    
    
    public function EventRole() 
    {
        if(!$oRole = $this->Rbac_GetRoleById($this->GetParam(0))){
            return Router::ActionError('Роль не найдена','Системная');
        }
        if(!is_object($oPayment = GetPayment($oRole))){
            return Router::ActionError($oPayment);
        }
        $this->Viewer_Assign('oPayment', $oPayment);
        $this->SetTemplateAction('payment'); 
    }
    
    public function EventAjaxAction($iActionId = null) 
    {
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        
        $iActionId = $iActionId?$iActionId:$this->GetParam(0);
        
        if(!$oAction = $this->PluginFreelancer_Market_GetActionById( $iActionId )){
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
            $oAction->setState(1);
            $this->Message_AddNotice('Роль активирована');
            return $this->EventAjaxAction($oAction->getId());
        }
    }
}