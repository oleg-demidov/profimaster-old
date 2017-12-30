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
class PluginYdirect_ActionAdmin extends PluginAdmin_ActionPlugin
{

    /**
     * Объект УРЛа админки, позволяет удобно получать УРЛы на страницы управления плагином
     */
    public $oAdminUrl;
    public $oUserCurrent;

    public function Init()
    {
        //$this->Logger_Notice('22');
        $this->oAdminUrl = Engine::GetEntity('PluginAdmin_ModuleUi_EntityAdminUrl');
        $this->oAdminUrl->setPluginCode(Plugin::GetPluginCode($this));
        $this->oUserCurrent = $this->User_GetUserCurrent();
     //   $this->Viewer_AppendScript(Plugin::GetWebPath(__CLASS__) . 'frontend/js/admin.js');

        $this->SetDefaultEvent('ads');
    }

    /**
     * Регистрируем евенты
     *
     */
    protected function RegisterEvent()
    {
        /**
         * Для ajax регистрируем внешний обработчик
         */
        $this->RegisterEventExternal('Ads', 'PluginYdirect_ActionAdmin_EventAds');
        
        $this->AddEventPreg('/^ads/i', '/^add$/i', 'Ads::EventAdd');
        $this->AddEventPreg('/^ads/i', '/^remove$/i', 'Ads::EventRemove');
        $this->RegisterEventExternal('Ads', 'PluginYdirect_ActionAdmin_EventAds');
        
        $this->RegisterEventExternal('Token', 'PluginYdirect_ActionAdmin_EventToken');
        $this->AddEventPreg('/^token/i', 'Token::EventGo');
        $this->AddEventPreg('/^code/i', 'Token::EventCode');
        
        $this->RegisterEventExternal('AdGroups', 'PluginYdirect_ActionAdmin_EventAdGroups');
        $this->AddEventPreg('/^adgroups/i', '/^([a-zA-Z0-9_]{1,50})?$/i', '/^([a-zA-Z0-9_]{1,50})?$/i','AdGroups::EventList');
        $this->AddEventPreg('/^adgroup/i', '/^(add|edit)$/i','/^([0-9]+)$/i', 'AdGroups::EventEdit');
        
        
        $this->RegisterEventExternal('Keywords', 'PluginYdirect_ActionAdmin_EventKeywords');
        $this->AddEventPreg('/^keyword$/i', '/^add$/i', 'Keywords::EventAdd');
        $this->AddEventPreg('/^keyword$/i', '/^remove$/i', 'Keywords::EventRemove');
    }

}