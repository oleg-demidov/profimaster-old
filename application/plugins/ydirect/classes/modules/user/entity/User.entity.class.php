<?php


class PluginYdirect_ModuleUser_EntityUser extends PluginYdirect_Inherit_ModuleUser_EntityUser
{
    /*
     * Если установить не подцепляется relation в ORM
     */
    protected $aBehaviors=array(
        // Настройка категорий
        'category'=>array(
            'class'=>'ModuleCategory_BehaviorEntity',
            'target_type'=>'specialization',
            'form_field'=>'specialization',
            'multiple'=>true,
            'validate_require'=>false,
            'validate_min'=>1,
            'validate_max'=>500,
            'validate_only_without_children'=>false,
            'validate_from_request'=>false,
            'object_type' => 'user',
            'classes' => 'specialization'
        ),
        'coordinates' =>array(
            'class'=>'PluginYmaps_ModuleYmaps_BehaviorEntity',
            'target_type'=>'order'
        ),
        'ygeo' => [
            'class' => 'PluginYdirect_ModuleGeo_BehaviorEntity',
            'target_type' => 'user'
        ]
    );
}