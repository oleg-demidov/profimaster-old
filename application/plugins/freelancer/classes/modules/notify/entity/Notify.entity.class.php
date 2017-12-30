<?php

class PluginFreelancer_ModuleNotify_EntityNotify extends EntityORM
{

    protected $aValidateRules=array(
        array('title','string','max'=>200,'min'=>3, 'allowEmpty' => true),
        array('text','string','max'=>5000,'min'=>5, 'allowEmpty' => true),
        array('type','type'),
    );
   
    protected $aRelations = array(
        'user'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'ModuleUser_EntityUser','user_id'),
    );

    public function ValidateType($sType) {
        $aAllowType = [
            'primary', 'success', 'info', 'warning', 'danger'
        ];
        if(in_array($sType, $aAllowType)){
            return true;
        }
        return "Неизвестный тип оповещения";
    }
}