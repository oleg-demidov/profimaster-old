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
class PluginFreelancer_ActionAdmin extends PluginAdmin_ActionPlugin
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

        $this->SetDefaultEvent('orders');
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
        $this->RegisterEventExternal('Orders', 'PluginFreelancer_ActionAdmin_EventOrders');
        
        $this->RegisterEventExternal('Bids', 'PluginFreelancer_ActionAdmin_EventBids');
       
        $this->AddEventPreg('/^orders$/i', '/^(new|publish|deleted)?$/i', 'Orders::EventList');
        $this->AddEventPreg('/^order-allow$/i','/^([0-9]+)?$/i', 'Orders::EventAjaxOrderAllow');
        $this->AddEventPreg('/^order-remove$/i','/^([0-9]+)?$/i', 'Orders::EventAjaxOrderRemove');
        $this->AddEventPreg('/^order-load$/i', 'Orders::EventAjaxOrderLoad');
        
        $this->AddEventPreg('/^bids$/i', '/^(new|publish|deleted)?$/i', 'Bids::EventList');
        $this->AddEventPreg('/^bid-allow$/i','/^([0-9]+)?$/i', 'Bids::EventAjaxBidAllow');
        $this->AddEventPreg('/^bid-remove$/i','/^([0-9]+)?$/i', 'Bids::EventAjaxBidRemove');
        $this->AddEventPreg('/^bid-load$/i', 'Bids::EventAjaxBidLoad');
        
        $this->RegisterEventExternal('Actions', 'PluginFreelancer_ActionAdmin_EventActions');
        $this->AddEventPreg('/^actions$/i', '/^edit$/i', '/^([0-9]+)?$/i', 'Actions::EventEdit');
        $this->AddEventPreg('/^actions$/i', '/^delete$/i', '/^([0-9]+)?$/i', 'Actions::EventDelete');
        $this->AddEventPreg('/^actions$/i', '/^(page([0-9]+))?/i', 'Actions::EventList');
        
        $this->RegisterEventExternal('Kbd', 'PluginFreelancer_ActionAdmin_EventKbd');
        $this->AddEventPreg('/^kbd$/i','/^(list)?$/i', 'Kbd::EventList');
        $this->AddEventPreg('/^kbd$/i','/^post$/i', '/^([0-9]+)?$/i', 'Kbd::EventPost');
        
    }

}