<?php

class PluginFreelancer_ModuleBalance_EntityTransaction extends EntityORM
{

    
    protected $aValidateRules=array(
       
    );
   
    protected $aRelations = array(
        'user'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'ModuleUser_EntityUser','user_id'),
    );
    
    
}