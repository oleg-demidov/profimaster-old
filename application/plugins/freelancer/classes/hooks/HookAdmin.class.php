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
class PluginFreelancer_HookAdmin extends Hook
{
    /**
     * Регистрация необходимых хуков
     */
    public function RegisterHook()
    {
        /**
         * Хук на отображение админки
         */
        $this->AddHook('init_action_admin', 'InitActionAdmin', null, 100000);
        $this->AddHook('template_fix_category_form_end', 'SetIconCategory', null, 10000);
    }

    /**
     * Добавляем в главное меню админки свой раздел с подпунктами
     */
    public function InitActionAdmin()
    {
        /**
         * Получаем объект главного меню
         */
        $oMenu = $this->PluginAdmin_Ui_GetMenuMain();
        /**
         * Добавляем новый раздел
         */
        $oMenu->AddSection(
            Engine::GetEntity('PluginAdmin_Ui_MenuSection')->SetCaption('Красота без диет')->SetName('kbd')->SetUrl('plugin/freelancer')->setIcon('user')
                ->AddItem(Engine::GetEntity('PluginAdmin_Ui_MenuItem')->SetCaption('Статьи')->SetUrl('kbd'))
        );
    }
    
    public function SetIconCategory($aParams) {
        $sValue = '';
        if(is_object($aParams['oCategory'])){
            $sValue = $aParams['oCategory']->_getIcon();            
        }

        $oViewer = $this->Viewer_GetLocalViewer();
        $oViewer->Assign('name', 'category[icon]',true);
        $oViewer->Assign('label', 'Иконка',true);
        $oViewer->Assign('value', $sValue,true);
        return $oViewer->Fetch('component@admin:field.text');        
    }
    
}