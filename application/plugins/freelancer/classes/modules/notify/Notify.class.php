<?php

class PluginFreelancer_ModuleNotify extends ModuleORM
{
    protected $oUserCurrent;
    
    protected $oMapper = null;
    
    protected $aAllowTemplate = [
        'email' => [
            'registration_activate',
            'specialization_leave1'
        ],
        'sms' => [],
        'panel' => [
            'specialization_leave1'
        ]
    ];

    public function Init()
    {
        parent::Init();
        $this->oUserCurrent = $this->User_GetUserCurrent();  
        $this->oMapperNotify = Engine::GetMapper('ModuleNotify');
    }
    
    public function Send($oUserTo, $sTemplate, $oTarget) {
        
        if($this->GetAllowTemplate('email', $sTemplate) or $oUserTo->getSettings('notify_email_'.$sTemplate)){
            $this->SendEmail($oUserTo, $sTemplate, $oTarget);
        }
        if($this->GetAllowTemplate('sms', $sTemplate) or ($oUserTo->isNotifySms() and $oUserTo->getSettings('notify_sms_'.$sTemplate)) ){
            $this->SendSms($oUserTo, $sTemplate, $oTarget);
        }
        if($this->GetAllowTemplate('panel', $sTemplate) or $oUserTo->getSettings('notify_panel_'.$sTemplate)){ 
            $this->AddToPanel($oUserTo, $sTemplate, $oTarget);
        }
    }
    
    public function GetAllowTemplate($sType, $sTemplate) {
        return in_array($sTemplate, $this->aAllowTemplate[$sType]);
    }
    public function GetText($oTarget, $sType, $sTemplate, $oUserTo) {
        $oViewerLocal = $this->Viewer_GetLocalViewer();
        $oViewerLocal->Assign('oTarget', $oTarget,true);
        $oViewerLocal->Assign('oUserCurrent', $this->oUserCurrent,true); 
        $oViewerLocal->Assign('oUserTo', $oUserTo,true);
        return $oViewerLocal->Fetch('component@freelancer:notify.'.$sType.'.'.$sTemplate);
    }
    
    public function SendEmail($oUserTo, $sTemplate, $oTarget) {
        
        $sHtml = $this->GetText($oTarget, 'email', $sTemplate, $oUserTo);
        //$this->Logger_Notice($sHtml);
        $sTitle = $this->Lang_Get('plugin.freelancer.notify.email.subject.'.$sTemplate);
        
        $oNotifyTask = Engine::GetEntity('Notify_Task');
        $oNotifyTask->setUserMail($oUserTo->getMail());
        $oNotifyTask->setUserLogin($oUserTo->getLogin());
        $oNotifyTask->setNotifyText($sHtml);
        $oNotifyTask->setNotifyTextAlt($sHtml);
        $oNotifyTask->setNotifySubject($sTitle);
        $oNotifyTask->setDateCreated(date("Y-m-d H:i:s"));
        $oNotifyTask->setNotifyTaskStatus(ModuleNotify::NOTIFY_TASK_STATUS_NULL);    
        
        if (Config::Get('module.notify.delayed') and !$bForceSend) {
            $this->oMapperNotify->AddTask($oNotifyTask);
        } else {
            /**
             * Отправляем мыло
             */
            $this->Notify_SendTask($oNotifyTask);
        }        
    }
    
    public function SendSms($oUserTo, $sTemplate, $oTarget) {
        if(!$oUserTo->getNumber()){
            return false;
        }
        $oSms = Engine::GetEntity('PluginFreelancer_Sms_Sms');
        $oSms->setNumber($oUserTo->getNumber());
        $oSms->setType('mess');
        
        $sSms = $this->GetText($oTarget, 'sms', $sTemplate);
        $oSms->setMess($sSms);        //$this->Logger_Notice($sSms);
        
        $this->PluginFreelancer_Sms_Send($oSms);
        return $oSms->Save();
    }
    
    public function AddToPanel($oUserTo, $sTemplate, $oTarget) {
        $oNotify = Engine::GetEntity('PluginFreelancer_Notify_Notify');
        
        $sHtml = $this->GetText($oTarget, 'panel', $sTemplate);
        //$this->Logger_Notice($sHtml);
        
        $oNotify->setText($sHtml);
        $oNotify->setTitle($this->Lang_Get('plugin.freelancer.notify.panel.'.$sTemplate));
        $oNotify->setUserId($oUserTo->getId());
        $oNotify->setType('info');
        if($oNotify->_Validate()){
            if($oNotify->Save()){
                return true;
            }
            return false;
        }else{
            $aErrors = $oNotify->_getValidateErrors();
            //$this->Message_AddError(serialize($aErrors), 'Ошибка', true);
            return false;
        }
    }

    public function Add($sTitle, $sText, $iUserId, $sType = 'info') {
        $oNotify = Engine::GetEntity('PluginFreelancer_Notify_Notify');
        $oNotify->setText($sText);
        $oNotify->setTitle($sTitle);
        $oNotify->setUserId(($iUserId)?$iUserId:$this->oUserCurrent->getId());
        $oNotify->setType($sType);
        if($oNotify->_Validate()){
            if($oNotify->Save()){
                $oNotify->setTitle($oNotify->getId().$sTitle);$oNotify->Save();
                return true;
            }
            return false;
        }else{
            $aErrors = $oNotify->_getValidateErrors();
            $this->Message_AddError($aErrors[0], 'Ошибка', true);
            return false;
        }
    }
    
    public function AddNotice($sTitle, $sText, $iUserId = null) {
        return $this->Add($sTitle, $sText, $iUserId, 'info');
    }
    
    public function AddAlert($sTitle, $sText, $iUserId = null) {
        return $this->Add($sTitle, $sText, $iUserId, 'warning');
    }
    
    public function AddError($sTitle, $sText, $iUserId = null) {
        return $this->Add($sTitle, $sText, $iUserId, 'danger');
    }
    
    public function GetNew( $mLimit = 5, $iUserId = null) {
        return $this->GetNotifyItemsByFilter([
            'user_id' => ($iUserId)?$iUserId:$this->oUserCurrent->getId(),
            'status' => 'new',
            '#limit' => $mLimit
        ]);
    }
    
    public function GetCount($iUserId = null) {
        return $this->GetCountItemsByFilter([
            'user_id' => ($iUserId)?$iUserId:$this->oUserCurrent->getId(),
            'status' => 'new'
        ], 'PluginFreelancer_ModuleNotify_EntityNotify');
    }
    
    public function SendOrders() {
        $aUserIds = $this->Rbac_GetUsersByPermissionCode('notify_orders');
        
        $aUsers = $this->User_GetUsersByArrayId($aUserIds);
        
        foreach ($aUsers as &$oUser){
            if(!$oUser->getSettings('notify_email_orders')){
                continue;
            }
            $aFilter = [];
            if($aSpecializations = $oUser->category->getCategories()){
                $aSpecIds = [];
                foreach ($aSpecializations as $oSpec){
                    $aSpecIds[] = $oSpec->getId();
                } 
                $aFilter['#category'] = $aSpecIds;
            }
            $date = new DateTime();
            $date->sub(new DateInterval('P1D'));
            $date  = $date->format("Y-m-d H:i:s");
            $aGeos = $oUser->ygeo->getGeos();
            $aFilter['#ygeo'] = array_keys($aGeos);
            $aFilter['#order'] = ['t.date_create' => 'ASC'];
            $aFilter['#where'] = [
                "t.date_create > ?" => [$date],
                "t.status = ?" => ['publish']
                    ];
            $aOrders = $this->PluginFreelancer_Order_GetOrderItemsByFilter($aFilter);
            if(sizeof($aOrders)){
                $this->Send($oUser, 'orders', $aOrders);            
            }
        }
    }
    
}
