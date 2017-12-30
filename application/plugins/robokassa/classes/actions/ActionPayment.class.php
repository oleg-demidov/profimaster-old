<?php


class PluginRobokassa_ActionPayment extends ActionPlugin
{

     protected $oUserCurrent = null;
     protected $sMode;
    
    public function Init()
    {
        $this->oUserCurrent =  $this->User_GetUserCurrent();
        $this->sMode = Config::Get('plugin.robokassa.mode');
    }

    /**
     * Регистрируем евенты
     *
     */
    protected function RegisterEvent()
    {
        $this->AddEventPreg( '/^payment$/i', '/^\d{1,10}$/i', 'EventIndex');
        $this->AddEventPreg( '/^result$/i',  'EventResult');
        $this->AddEventPreg( '/^success$/i', 'EventSuccess');
        $this->AddEventPreg( '/^fail$/i', 'EventFail');
    }


    /**********************************************************************************
     ************************ РЕАЛИЗАЦИЯ ЭКШЕНА ***************************************
     **********************************************************************************
     */


    protected function EventIndex(){
        $oPayment = $this->PluginRobokassa_Payment_GetPaymentById($this->GetParam(0));
        
        
        if(!$MerchantLogin = Config::Get('plugin.robokassa.shop.login')){
            return 'Не найден логин от Робокассы';            
        }
        
        if(!$Pass1 = Config::Get('plugin.robokassa.'.$this->sMode.'.pass1')){
            return 'Не найден пароль 1 от Робокассы';
        }
        
        if(!$Pass2 = Config::Get('plugin.robokassa.'.$this->sMode.'.pass2')){
            return 'Не найден пароль 2 от Робокассы';
        }
        
        if(!$OutSum = $oPayment->getSumm()){
            return 'Нет суммы платежа';
        }
        
        if(!$InvDesc = $oPayment->getComm()){
            return 'Нет описания платежа';
        }
        $iInvId = $oPayment->getId();
        $OutSummCurrency = Config::Get('plugin.robokassa.currency');
        $sSig = "$MerchantLogin:$OutSum:$iInvId:$OutSummCurrency:$Pass1";
        //echo $sSig;
        $SignatureValue  = md5($sSig);
        $Culture = ($sCulture = Config::Get('plugin.robokassa.culture'))?$sCulture:"en";
        $Email = $this->oUserCurrent->getMail()?$this->oUserCurrent->getMail():'';       
        
        
        $aQueryParams = [
            'MerchantLogin' => $MerchantLogin,
            'OutSum' => $OutSum,
            'InvId' => $iInvId,
            'Desc' => $InvDesc,
            'Culture'=> $Culture,
            'Email' => $Email,
            'SignatureValue' =>  $SignatureValue,
            'OutSumCurrency' => $OutSummCurrency
        ];
        
        if($this->sMode == 'test'){
            $aQueryParams['IsTest'] = 1;
        }
        //print_r($aQueryParams);
        $sQuery = http_build_query($aQueryParams);
        $sUrl = Config::Get('plugin.robokassa.url');
        //$this->Logger_Notice($sUrl.'?'.$sQuery);
        Router::Location( $sUrl.'?'.$sQuery );
        $this->SetTemplate(false);
    }
    
    public function EventResult() {
        $iInvId = getRequest('InvId');
        if(!$oPayment = $this->PluginRobokassa_Payment_GetPaymentById($iInvId)){
            return;
        }
        if(!$Pass2 = Config::Get('plugin.robokassa.'.$this->sMode.'.pass2')){
            return 'Не найден пароль 2 от Робокассы';
        }
        $iOutSum = getRequest('OutSum');
        
        $sSig = "$iOutSum:{$oPayment->getId()}:$Pass2";
        
        if(md5("$iOutSum:$iInvId:$Pass2") != strtolower(getRequest('SignatureValue'))){
            $this->Logger_Notice('Robokassa: Не верная сигнатура в ответе');
            return;
        }
        $oPayment->setMethod(getRequest('PaymentMethod'));
        $oPayment->setState(1);
        $oPayment->setDatePay(date("Y-m-d H:i:s"));
        $oPayment->Save();
        $this->Hook_Run('robokassa_pay', ['payment' => $oPayment]);
        echo 'OK'.$oPayment->getId();
        $this->SetTemplate(false);
    }
    
    public function EventSuccess() 
    {
        $iInvId = getRequest('InvId');
        if(!$oPayment = $this->PluginRobokassa_Payment_GetPaymentById($iInvId)){
            return Router::ActionError('Обратитесь в администрацию', "Счет не найден");
        }
        $this->Component_Add('robokassa:payment');
        $this->Viewer_Assign('oPayment', $oPayment);
    }
    
    public function EventFail() 
    {
        $iInvId = getRequest('InvId');
        if(!$oPayment = $this->PluginRobokassa_Payment_GetPaymentById($iInvId)){
            return Router::ActionError('Обратитесь в администрацию', "Счет не найден");
        }
        $this->Message_AddError('Оплата не прошла','Ошибка');
        $this->Component_Add('robokassa:payment');
        $this->Viewer_Assign('oPayment', $oPayment);
    }
}