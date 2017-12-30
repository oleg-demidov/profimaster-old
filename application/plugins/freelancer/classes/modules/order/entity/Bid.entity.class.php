<?php


class PluginFreelancer_ModuleOrder_EntityBid extends EntityORM
{
    protected $aBehaviors=array(
        
    );
    
    public function Init() {
        
    }
    
    protected $aValidateRules=array(
        array('text','bid_text','max'=>2000,'min'=>10, 'on' => ['']),
        array('order_id','order_id', 'on' => ['']),
        array('order_id','order', 'on' => ['add']),
        array('user_id','user_id', 'on' => ['']),
        array('price','number','max'=>200000000,'min'=>1, 'on' => ['']),
    );
    
    protected $aRelations = array(
        'user'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'ModuleUser_EntityUser','user_id'),
        'order'=>array(EntityORM::RELATION_TYPE_BELONGS_TO, 'PluginFreelancer_ModuleOrder_EntityOrder','order_id'),
    );
        
    public function ValidateBidText($sValue) {
        if (!func_check($sValue, 'text', 2, 10000)) {
            return $this->Lang_Get('topic.comments.notices.error_text');            
        }
        return true;
    }
    
    public function ValidateOrderId($iOrderId) {
        if (!$this->PluginFreelancer_Order_GetOrderByFilter(['id' => $iOrderId])) {
            return 'Заказ не найден';            
        }
        return true;
    }
    
    public function ValidateOrder($iOrderId) {
        if($oBid = $this->PluginFreelancer_Order_GetBidByOrderIdAndUserId(
                getRequest('order_id'),
                $this->User_GetUserCurrent()->getId())){
            return $this->Lang_Get('plugin.freelancer.errors.no_create_response_more');
        }
        return true;
    }
    
    public function ValidateUserId($iUserId) {
        if (!$this->User_IsAuthorization() or $this->User_GetUserCurrent()->getId() != $iUserId) {
            return 'Пользователь не найден';            
        }
        return true;
    }
    public function _isAllowEdit($oUser = '') {
        if(!$oUser){
            $oUser = $this->User_GetUserCurrent();
        }
        if($oUser){
            return ($oUser->getId() == $this->getUserId() or $this->User_GetUserCurrent()->isAdministrator());
        }
        return false;
    }
    public function getTextCrop($iCount) {
        return func_text_words($this->getText(), $iCount);
    }
    public function getOrder() {
        return $this->PluginFreelancer_Order_GetOrderByFilter(['id' => $this->getOrderId()]);
    }
}