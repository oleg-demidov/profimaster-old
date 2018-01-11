<?php
/**
 * 
 * 
 * @author Oleg Demidov
 *
 */


class PluginParser_HookAdminka extends Hook
{

    public function RegisterHook()
    {
        $this->AddHook('init_action_admin', 'InitActionAdmin', null, 100000);
    }


    public function InitActionAdmin()
    {
        /**
         * Получаем объект главного меню
         */
        $oMenu = $this->PluginAdmin_Ui_GetMenuMain();
        /**
         * Добавляем новый раздел
         */
        $oMenu->getSection('users')->AddItem(Engine::GetEntity('PluginAdmin_Ui_MenuItem')->SetCaption('Добавить пользователя')->SetUrlFull('admin/plugin/parser/user_add'));
    }

}

