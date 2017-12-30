<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionOrder_EventBid extends Event {

 
    public function EventAjaxAdd() {
        $this->Viewer_SetResponseAjax('json');
        
        if(!$oOrder = $this->PluginFreelancer_Order_GetOrderByFilter(['id' => getRequest('order_id')])){
            $this->Message_AddError('Заказ не найден');
            return;
        }
        
        $iIsMaster = ($this->oUserCurrent->getId() == $oOrder->getMasterId());
        
        if(!$iIsMaster and !$this->oUserCurrent->isCreateBid()){
            $this->Message_AddError($this->Rbac_GetMsgLast());
            return;
        }
        
        if($sText = getRequestStr('bid_text')){
            $oBid = Engine::GetEntity('PluginFreelancer_Order_Bid');            
            $oBid->setText($sText);
            $oBid->setPrice(getRequest('price'));
            $oBid->setOrderId(getRequest('order_id'));
            $oBid->setUserId($this->oUserCurrent->getId());
            
            $oBid->_setValidateScenario('add');
            
            if($oBid->_Validate()){
                if($oBid->Save()){
                    if(!$iIsMaster){
                        $this->Rbac_IsAllow('create_bid', 'freelancer', ['stat' => true]);
                    }
                    $this->NotifyEmployerByBid($oBid, $oOrder);
                    $this->oUserCurrent->setRating($this->oUserCurrent->_getDataOne('user_rating')
                                +Config::Get('plugin.freelancer.rating.offset.create_bid'));
                    $this->User_Update($this->oUserCurrent);
                    $this->Viewer_AssignAjax('res',1);
                    $this->Message_AddNotice('Отклик успешно добавлен');
                }
            }else{
                foreach($oBid->_getValidateErrors() as $aError){
                    $this->Message_AddError($aError[0]);
                }   
            }
        }
    }
    
    public function NotifyEmployerByBid($oBid, $oOrder) {
        if($oUser = $oOrder?$oOrder->getUser():null){
            $this->PluginFreelancer_Notify_Send($oUser, 'bid', $oBid);
        }
    }
    
    public function EventAjaxEdit() {
        $this->Viewer_SetResponseAjax('json');
        if($sText = getRequestStr('bid_text')){
            
            if(!$oBid = $this->PluginFreelancer_Order_GetBidById(getRequest('bid_id'))){
                $this->Message_AddErrorSingle($this->Lang_Get('plugin.freelancer.errors.no_create_response_more'));
                return false;     
            }
            $oBid->setText($sText);
            $oBid->setPrice(getRequest('price'));
            if($oBid->_Validate()){
                if($oBid->Save()){
                    $this->Viewer_AssignAjax('res',1);
                    $this->Message_AddNotice('Отклик успешно изменен');
                }
            }else{
                foreach($oBid->_getValidateErrors() as $aError){
                    $this->Message_AddError($aError[0]);
                }   
            }
        }
    }
        
   public function EventAjaxRemove() {
        $this->Viewer_SetResponseAjax('json');
        $iIdBid = getRequest('idBid');
        
        if( !$oBid= $this->PluginFreelancer_Order_GetBidById($iIdBid)  ){
            $this->Message_AddError($this->Lang_Get('plugin.freelancer.errors.no_response'));
            return;
        }
        if(!$this->oUserCurrent->getId() == $oBid->getUserId() and !$this->oUserCurrent->isAdministrator()){
            $this->Message_AddError($this->Lang_Get('plugin.freelancer.errors.noallow_edit'));
            return;
        }
       
        if($oBid->Delete()){
            //$this->Rbac_IsAllow('create_bid', 'freelancer', ['stat_off' => -1]);
            $this->Message_AddNotice($this->Lang_Get('plugin.freelancer.bid_is_deleted'));  
            $this->Viewer_AssignAjax('res',1);
        }else{
             $this->Viewer_AssignAjax('res',0);
        }
    }
    
    public function EventGetAjaxForm() {
        $this->Viewer_SetResponseAjax('json');
        $iIdBid = getRequest('idBid');
        if(!$oBid = $this->PluginFreelancer_Order_GetBidById($iIdBid)){
            $this->Message_AddErrorSingle($this->Lang_Get('freelancer.errors.no_bid'));
            return false;
        }
        if(!$oOrder = $oBid->getOrder()){
            $this->Message_AddErrorSingle($this->Lang_Get('freelancer.errors.no_order'));
            return false;
        }
        $oViewer = $this->Viewer_GetLocalViewer();
        $oViewer->Assign('oOrder', $oOrder,true);
        $oViewer->Assign('oBid', $oBid,true);
        $this->Viewer_AssignAjax('sForm', $oViewer->Fetch("component@freelancer:bid.form"));
        $this->Viewer_AssignAjax('iBidId', $iIdBid);
    }
    
    
}