<?php
/*
 * LiveStreet CMS
 * Copyright © 2013 OOO "ЛС-СОФТ"
 *
 * ------------------------------------------------------
 *
 * Official site: www.livestreetcms.com
 * Contact e-mail: office@livestreetcms.com
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * ------------------------------------------------------
 *
 * @link http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author Maxim Mzhelskiy <rus.engine@gmail.com>
 *
 */

/**
 * Сущность блога
 *
 * @package application.modules.blog
 * @since 1.0
 */
class PluginFreelancer_ModuleFreelancer_EntityBlog extends PluginFreelancer_Inherit_ModuleBlog_EntityBlog
{

    protected $aBehaviors = array(
        // Категории
        'category' => array(
            'class'                          => 'ModuleCategory_BehaviorEntity',
            'target_type'                    => 'specialization',
            'form_field'                     => 'specialization',
            'object_type' => 'blog',
            'multiple'                       => true,
            'validate_require'               => false,
            'validate_only_without_children' => true,
        ),
    );

}