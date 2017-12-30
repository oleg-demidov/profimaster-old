<?php

class PluginFreelancer_ModuleBlog extends PluginFreelancer_Inherit_ModuleBlog
{
    
    protected $aBehaviors = array(
        // Категории
        'category' => array(
            'class'       => 'ModuleCategory_BehaviorModule',
            'target_type' => 'specialization',
        ),
    );

}