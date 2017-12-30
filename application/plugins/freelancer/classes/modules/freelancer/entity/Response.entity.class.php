<?php

class PluginFreelancer_ModuleFreelancer_EntityResponse extends EntityORM
{

    protected $aBehaviors=array(
        'media'=>array(
            'class'=>'PluginFreelancer_ModuleMedia_BehaviorEntity',
            'target_type'=>'response'
        )
    );
    protected $aValidateRules=array(
        array('text','string','max'=>3000,'min'=>20, 'allowEmpty' => false),
        array('target_id','target'),
        array('raiting','number','max'=>5,'min'=>0),
    );
   
    protected $aRelations = array(
        //'order'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'PluginFreelancer_ModuleOrder_EntityOrder','order_id'),
        'target'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'ModuleUser_EntityUser','target_id'),
        'user'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'ModuleUser_EntityUser','user_id'),
    );
    
    public function ValidateTarget($iUserId) {
        if(!$this->User_GetUserById($iUserId)){
            return "Пользователь не найден";
        }
        return true;
    }
    public function getOrder() {
        return  $this->PluginFreelancer_Order_GetOrderByFilter(['id' => $this->getOrderId()]);
    }
    public function isAllowEdit($oUser) {
        if(!$this->getUserId()){
            return true;
        }
        return ($this->getUserId() == $oUser->getId());
    }
    public function getCropText() {
        return func_text_words($this->getText(), 5);
    }
}