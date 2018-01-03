<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionManager_EventProfile extends Event {

    

    public function Init() { 
        $this->Component_Add('freelancer:manager');
        $this->Component_Add('freelancer:phone-hide');
        
        $this->oUser = $this->User_GetUserById($this->sCurrentEvent);
        if(!$this->oUser){
            $this->oUser = $this->User_GetUserByLogin($this->sCurrentEvent);
        }
        if(!$this->oUser){
            $this->Message_AddError('Такого пользователя не существует','Ошибка', true);
            Router::LocationAction('error');
        }
        
        /*if(!$this->oUser->isManager()){
            Router::LocationAction('user/'.$this->oUser->getLogin());
        }*/
        
        $iPaymentsCount = $this->Invite_GetCountItemsByFilter($this->getPaymentFilter(), 'PluginRobokassa_ModulePayment_EntityPayment');
        
        $this->Viewer_Assign('oUserCurrent', $this->oUserCurrent);
        $this->Viewer_Assign('oUserProfile', $this->oUser);        
        $this->Viewer_Assign('oUser', $this->oUser);
        $this->Viewer_Assign('iCountInvites', $this->Invite_GetCountInviteUsed($this->oUser));
        $this->Viewer_Assign('iPaymentsCount', $iPaymentsCount);
        $this->Viewer_Assign('fBalance', $this->PluginFreelancer_Balance_GetBalance($this->oUser));
    }
    
    public function EventInvites() {
        if(!$this->oUserCurrent){
            return Router::ActionError('Нет доступа');
        }
        
        if($this->oUserCurrent->getId() != $this->oUser->getId() and !$this->oUserCurrent->isAdministrator()){
            return Router::ActionError('Нет доступа');
        }
        
        $iPage = $this->GetParamEventMatch(1, 2) ? $this->GetParamEventMatch(1, 2) : 1;
        
        $aFilter = ['from_user_id' => $this->oUser->getId(), '#index-from' => 'to_user_id', '#select' => 't.to_user_id'];
        
        $aFilter['#page'] = [$iPage, Config::Get('plugin.freelancer.poisk.per_page')];
        
        $aFilter['#order'] = ['date_create' => 'desc']; 
        
        $aUseItems = $this->Invite_GetUseItemsByFilter($aFilter);
        
        $aPaging = $this->Viewer_MakePaging($aUseItems['count'], $iPage, Config::Get('plugin.freelancer.poisk.per_page'),
            Config::Get('plugin.freelancer.poisk.count_page_line'), Router::GetPath('manager/'.$this->oUser->getLogin().'/invites'), $_REQUEST);
        
        $this->Viewer_Assign('paging', $aPaging);
        
        $aUserIds = array_keys($aUseItems['collection']);
        $aUsersInvite = $this->User_GetUsersAdditionalData($aUserIds);
        
        $this->Viewer_Assign('aUsersInvite', $aUsersInvite);
        
        $this->Viewer_Assign('sCurrentPage', 'invites');
        $this->SetTemplateAction('invites');      
    }
    
    public function EventPayments() {
        if(!$this->oUserCurrent){
            return Router::ActionError('Нет доступа');
        }
        
        if($this->oUserCurrent->getId() != $this->oUser->getId() and !$this->oUserCurrent->isAdministrator()){
            return Router::ActionError('Нет доступа');
        }
        
        $aFilter = $this->getPaymentFilter();
        
        $iPage = $this->GetParamEventMatch(1, 2) ? $this->GetParamEventMatch(1, 2) : 1; 
        
        $aFilter['#page'] = [$iPage, Config::Get('plugin.freelancer.poisk.per_page')];        
        
        $aFilter['#with'] = ['user'];
        
        $aFilter['#order'] = ['date_pay' => 'desc'];
        
        $aPayments = $this->PluginRobokassa_Payment_GetPaymentItemsByFilter($aFilter);
        
        $aPaging = $this->Viewer_MakePaging($aPayments['count'], $iPage, Config::Get('plugin.freelancer.poisk.per_page'),
            Config::Get('plugin.freelancer.poisk.count_page_line'), Router::GetPath('manager/'.$this->oUser->getLogin().'/payments'), $_REQUEST);
        
        $this->Viewer_Assign('paging', $aPaging);
        
        $this->Viewer_Assign('aPayments', $aPayments['collection']);
        
        $this->Viewer_Assign('sCurrentPage', 'payments');
        $this->SetTemplateAction('payments');      
    }
    public function getPaymentFilter() {
        $sTableName = MapperORM::GetTableName(Engine::GetEntity('Invite_Use'));
        $aFilter['#join'] = ['JOIN '.$sTableName.' as us ON us.from_user_id = ?d AND t.user_id = us.to_user_id' => [$this->oUser->getId()]];
        $aFilter['#where'] = ['t.state > ?d' => [0]];
        return $aFilter;
    }
    
    public function EventTransactions() {
        if(!$this->oUserCurrent){
            return Router::ActionError('Нет доступа');
        }
        
        if($this->oUserCurrent->getId() != $this->oUser->getId() and !$this->oUserCurrent->isAdministrator()){
            return Router::ActionError('Нет доступа');
        }
        
        $aFilter = ['user_id' => $this->oUser->getId()];
        
        $iPage = $this->GetParamEventMatch(1, 2) ? $this->GetParamEventMatch(1, 2) : 1; 
        
        $aFilter['#page'] = [$iPage, Config::Get('plugin.freelancer.poisk.per_page')];        
        
        $aFilter['#with'] = ['user'];
        
        $aFilter['#order'] = ['date_create' => 'desc'];
        
        $aTransactions = $this->PluginFreelancer_Balance_GetTransactionItemsByFilter($aFilter);
        
        $aPaging = $this->Viewer_MakePaging($aTransactions['count'], $iPage, Config::Get('plugin.freelancer.poisk.per_page'),
            Config::Get('plugin.freelancer.poisk.count_page_line'), Router::GetPath('manager/'.$this->oUser->getLogin().'/transactions'), $_REQUEST);
        
        $this->Viewer_Assign('paging', $aPaging);
        
        $this->Viewer_Assign('aTransactions', $aTransactions['collection']);
        
        $this->Viewer_Assign('sCurrentPage', 'transactions');
        $this->SetTemplateAction('transactions');      
    }    
    
    public function EventResponses() 
    {
        $this->Component_Add('freelancer:response');
        $this->Component_Add('freelancer:order');
        $this->Component_Add('admin:p-plugin');  
        $aFilter = ['target_id' => $this->oUser->getId()];        
        $aFilter['#order'] = ['date_create' => 'desc'];
        
        $iPage = $this->GetParamEventMatch(1, 2) ? $this->GetParamEventMatch(1, 2) : 1;
        $aFilter['#page'] = [$iPage, Config::Get('plugin.freelancer.poisk.per_page')];
        
        $aResponses = $this->PluginFreelancer_Freelancer_GetResponseItemsByFilter($aFilter);
        
        $aPaging = $this->Viewer_MakePaging($aResponses['count'], $iPage, Config::Get('plugin.freelancer.poisk.per_page'),
            Config::Get('plugin.freelancer.poisk.count_page_line'), Router::GetPath('user/'.$this->oUser->getId().'/responses'), $_REQUEST);
        
        $this->Viewer_Assign('paging', $aPaging);
        $this->Viewer_Assign('aResponses', $aResponses['collection']);
        $this->Viewer_Assign('sCurrentPage', 'responses');
        $this->SetTemplateAction('responses');
    }
    
    
}