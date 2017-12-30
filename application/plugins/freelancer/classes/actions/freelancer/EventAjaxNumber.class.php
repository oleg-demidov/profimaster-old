<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionFreelancer_EventAjaxNumber extends Event {
    
     public function Init()
    {
         $this->Viewer_SetResponseAjax('json');
    }

    public function EventValidateNumber()
    {
        $sNumber = getRequest('number');
        if(!$oUser = $this->User_GetUserByNumber($sNumber)){
            $this->Message_AddError("Пользователь не найден");
            return;
        }
        
        if(!$this->User_IsNumber($sNumber)){
            $this->Message_AddError("$sNumber Не соответствует номеру телефона");
            return;
        }        
        if(!$this->User_NumberIsExits($sNumber)){
            $this->Message_AddError("$sNumber Номера нет в базе");
            return;
        }
        $iCount = $this->PluginFreelancer_Sms_GetCountItemsByFilter([
            'number' => $sNumber,
            'type' => 'reg'], 'PluginFreelancer_ModuleSms_EntitySms');
        if($iCount >= Config::Get('plugin.freelancer.sms.max_count_reg')){
            $this->Message_AddError("Вы больше не можете получить смс. Обратитесь в поддержку");
            return;
        }
        $sKod = rand(1000,9999);
        $oUser->setActivateKey($sKod);
        $this->User_Update($oUser);
        
        //$this->Viewer_AssignAjax('kod', $sKod);
        $oSms = Engine::GetEntity('PluginFreelancer_Sms_Sms');
        $oSms->setNumber($sNumber);
        $oSms->setType('reg');
        $oSms->setMess($this->Lang_Get('plugin.freelancer.text.sms.valid', ['kod' => $sKod]));
        $this->PluginFreelancer_Sms_Send($oSms);
        $oSms->Save();
        
        $this->Message_AddNotice("Вам отправлено смс");
    }
    
    public function EventValidateNumberKod(){
        if(!$oUser = $this->User_GetUserByActivateKey(getRequest('kod'))){
            $this->Message_AddError("Код не верный");
            return;
        }
        if($oUser->getActivateKey() != getRequest('kod')){
            $this->Message_AddError("Код не верный");
            return;
        }
        $oUser->setActivate(1);
        if($this->User_Update($oUser)){
            $this->Viewer_AssignAjax('activate', 1);
            $this->Viewer_AssignAjax('url', $oUser->getUserWebPath());
            $this->Message_AddNotice("Номер подтвержден. Активация выполнена");
            $this->User_Authorization($oUser, false);
        }
    }
}