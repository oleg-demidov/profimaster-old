<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionPay extends ActionPlugin{
    
    protected $oUserCurrent;
    
    protected function RegisterEvent() {
        
        
        
        $this->RegisterEventExternal('Market','PluginFreelancer_ActionPay_EventMarket');
        $this->AddEventPreg('/^permission+/i','Market::EventPermission');        
        $this->AddEventPreg('/^role+/i','Market::EventRole');
        $this->AddEventPreg('/^success+/i','Market::EventSuccess');
        $this->AddEventPreg('/^fail+/i','Market::EventFail');
        $this->AddEventPreg('/^ajax-permission/i', 'Market::EventAjaxPermission');
        $this->AddEventPreg('/^ajax-role/i', '/^([0-9]+)|[a-zA-Z0-9_]{1,50}/i', '/^([0-9]+)?/i','Market::EventAjaxRoleForm');
        $this->AddEventPreg('/^ajax-payment+/i', 'Market::EventAjaxPayment');
        $this->AddEventPreg('/^market|ajax-market/i','Market::EventAjaxMarket');   
        $this->AddEventPreg('/^success+/i','Market::EventSuccess');
        $this->AddEventPreg('/^fail+/i','Market::EventFail');
        
        $this->AddEventPreg('/^ajax-action/i', '/^([0-9]+)/i', 'Market::EventAjaxAction');
        $this->AddEventPreg('/^ajax-action/i', '/^active$/i', '/^([0-9]+)/i', 'Market::EventAjaxActionActive');
        
    }

    public function Init() {      
        $this->SetDefaultEvent('index');
        $this->oUserCurrent =  $this->User_GetUserCurrent();        
        
    }
    
    public function GetRoleByPermissionId($iPerId){
        $oPermisson = $this->Rbac_GetPermissionById($iPerId);
        if(!$oPermisson){
            return null;
        }
        return $this->Rbac_GetRoleByCode($this->oUserCurrent->getStrRole().'_'.$oPermisson->getCode());
    }

    public function GetPayment($oRole, $dExpiration = 1) 
    {
        $oPayment = Engine::GetEntity('PluginRobokassa_Payment_Payment');
        $oPayment->setType('role');
        $oPayment->setUserId($this->oUserCurrent->getId());
        $oPayment->setProductId($oRole->getId());
        $oPayment->setSumm($this->GetSummPayment($oRole->getPrice(), $dExpiration));
        $oPayment->setComm('Покупка привилегии "'.$oRole->getTitle().'"');
        $oPayment->setExpiration($dExpiration);
        
        if($oPayment->_Validate()){
            if($oPayment->Save()){
                $oPayment = $this->PluginRobokassa_Payment_GetPaymentById($oPayment->getId());
                return $oPayment;               
            }else{
                return 'Системная ошибка';
            }
        }else{
            return $oPayment->_getValidateError();
        }
    }    
    
    public function GetSummPayment($iPrice, $iDays) {
        $cof = Config::Get('plugin.freelancer.market.price_cof');
        $cofLimit = Config::Get('plugin.freelancer.market.price_cof_limit');
        if($iDays>$cofLimit){
            $countDaysCof = $cofLimit;
        }else{
            $countDaysCof = $iDays;
        }

        return ceil( ($iPrice*$iDays)-($iPrice*$iDays*($countDaysCof*$cof)) );
    }
}