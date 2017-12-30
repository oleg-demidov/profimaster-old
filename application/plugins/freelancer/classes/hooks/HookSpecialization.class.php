<?php
/**
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
 * Хуки
 */
class PluginFreelancer_HookSpecialization extends Hook
{
    /**
     * Регистрация необходимых хуков
     */
    public function RegisterHook()
    {
        /**
         * Хук на отображение админки
         */
        $this->AddHook('blog_edit_before', 'SaveBlogSpecialization', null, 100000);
        $this->AddHook('blog_add_before', 'SaveBlogSpecialization', null, 100000);
    }

    /**
     * Добавляем в главное меню админки свой раздел с подпунктами
     */
    public function SaveBlogSpecialization($aParams)
    {
        $aParams['oBlog']->setSpecialization(getRequest('specialization'));        //print_r($aParams['oBlog']->_getData());
        $aParams['oBlog']->_Validate();
        //$this->Category_SaveCategories($this->oUserCurrent, 'specialization');
    }

}