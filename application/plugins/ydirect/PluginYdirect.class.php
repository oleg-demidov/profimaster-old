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
 * @author Serge Pustovit (PSNet) <light.feel@gmail.com>
 *
 */

/**
 * Запрещаем напрямую через браузер обращение к этому файлу
 */

if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

class PluginYdirect extends Plugin
{
    
    protected $aInherits = array(
        'template' => array(
            //'admin:component.p-category.form' => '_components/p-category/form.tpl',
            //'component.field.geo' => '_components/field/field.geo.tpl'
        ),
        'entity' =>array(
           // 'ModuleCategory_EntityCategory' => '_ModuleCategory_EntityCategory',
            //'ModuleUser_EntityUser' => '_ModuleUser_EntityUser'
            ),
        //'event' => ['PluginAdmin_ActionAdmin_EventCategory' => 'PluginYdirect_ActionAdmin_EventCategory']
    );
        
    protected $iTimeCheckPermissions = 1;
    
    protected $iTimeUpdateAds = 5;


    protected $aRoles = array(
        'groups' => array(
            array('ydirect', 'Ydirect'),
        ),
        'permissions' => array(
            /*
             * Специализация
             */
            array(
                'ydirect',
                'Раскрутка в Яндекс директе',
                'msg_error' => 'plugin.ydirect.error.stop_ydirect',
                'group' => 'ydirect',
                'roles' => array()),
            )
        );
    
    protected $aRolesRemove = array(
        'groups' => array('ydirect')
    );
    /**
     * Активация плагина
     *
     * @return bool
     */
    public function Activate()
    {
        
        if(!in_array('freelancer', $this->PluginManager_GetPluginsActive())){
            $this->Message_AddError('Необходимо установить зависиимость: Плагин "freelancer"','Ошибка установки',true);
            return false;
        }
        $this->addUserField([
            'type' => 'keywords',
            'title' => 'Ключевые слова',
            'name' => 'keywords',
            'pattern' => ''
        ]);
        
        if (!$this->Rbac_CreatePermissions($this->aRoles, 'ydirect')) {
            return false;
        }
        
        /*if (!$this->Property_CreateDefaultTargetPropertyFromPlugin($this->aProperties,'user')) {
                return false;
        }*/
        
        $this->Cron_CreateTask(
            'Включает/Выключает Группы обьявлений', 
            'PluginYdirect_Ads_UpdateAdgroup', 
            $this->iTimeCheckPermissions, $this
        );
        
        $this->Cron_CreateTask(
            'Обновляет статус обьявлений', 
            'PluginYdirect_Ydirect_AdsUpdateCron', 
            $this->iTimeUpdateAds, $this
        );
        return true;
    }


    /**
     * Инициализация плагина
     */
    public function Init()
    {
        $this->User_AddUserFieldTypes('keywords');
    }


    /**
     * Проверка зависимостей плагина
     *
     * @return bool
     */
    public function Deactivate()             
    {
        $this->User_deleteUserField($this->GetIdFieldByTypeName('keywords'));
        $this->Cron_RemoveTasksByPlugin($this);
        $this->Rbac_RemovePermissions($this->aRolesRemove, 'ydirect');
        return true;
    }

    protected function GetIdFieldByTypeName($sName) {
        $aField = $this->User_userFieldExistsByName($sName);
        if(is_array($aField) && isset($aField[0])){
            return $aField[0]['id'];
        }
        return false;
    }
    protected function addUserField($aData) {
        $oField = Engine::GetEntity('ModuleUser_EntityField');
        $oField->_setData($aData);
        $this->User_addUserField($oField);
    }
}

?>