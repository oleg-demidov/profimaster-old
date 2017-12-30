<?php


class PluginRobokassa_ModulePayment_EntityPayment extends EntityORM
{
    protected $aValidateRules=array(
        array('type','string','max'=>20,'min'=>1, 'allowEmpty' => false),
        array('user_id','number'),
        array('summ','number')
    );
    
    protected $aRelations = array(
        'user' => array(
            self::RELATION_TYPE_BELONGS_TO,
            'ModuleUser_EntityUser',
            'user_id'
        )
    );
}

