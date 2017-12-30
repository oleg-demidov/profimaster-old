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
class PluginFreelancer_HookMain extends Hook
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
        /**
         * Хук на главное меню сайта
         */
        $this->AddHook('template_nav_main_alt', 'NavMain', null, 655);
        
       
        $this->AddHook('template_nav_userbar_nav', 'UserbarNav', null, 655);
        
        //$this->AddHook('action_event_community_after', 'IndexAfter', null, 655);
        //$this->AddHook('action_event_blog_after', 'BlogAfter', null, 655);
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
            Engine::GetEntity('PluginAdmin_Ui_MenuSection')->SetCaption($this->Lang_Get('plugin.freelancer.admin.title'))->SetName('freelancer')->SetUrl('plugin/freelancer')->setIcon('user')
                ->AddItem(Engine::GetEntity('PluginAdmin_Ui_MenuItem')->SetCaption($this->Lang_Get('plugin.freelancer.admin.menu.orders'))->SetUrl('orders'))
                ->AddItem(Engine::GetEntity('PluginAdmin_Ui_MenuItem')->SetCaption('Акции')->SetUrl('actions'))
                //->AddItem(Engine::GetEntity('PluginAdmin_Ui_MenuItem')->SetCaption($this->Lang_Get('plugin.freelancer.admin.menu.responses'))->SetUrl('responses'))
        );
    }

    /**
     * Добавляем пункты в главное меню
     *
     * @param $aParams
     *
     * @return array
     */
    public function NavMain($aParams)
    {
        
        
        if($this->User_GetUserCurrent()){       
            $oViewerLocal = $this->Viewer_GetLocalViewer();
            $iCount = $this->PluginFreelancer_Notify_GetCount();
            $oViewerLocal->Assign('count',$iCount, true);
            $oViewerLocal->Assign('classes','fl-notify-bell', true);
            $sHtml = $oViewerLocal->Fetch('component@freelancer:notify.bell');


            $aResult = array_merge($aParams['items'], [[
                    'icon' => 'bell',
                    //'text' => ' ',
                    'html'  => $sHtml,
                    'name' => 'bell',
                    'classes' => 'js-fl-notify-bell-toggle',
                    'attributes' => ['data-lsmodaltoggle-modal' => "js-fl-notify-modal"]
                ]]);
        }
        return    $aResult;

    }
    
    public function UserbarNav($aParams)
    {
        $oUserCurrent = $this->User_GetUserCurrent();
        if(!$oUserCurrent){
            return $aParams['items'];
        }
        
        if($this->Rbac_IsAllowUser($oUserCurrent, 'create_order', 'freelancer', ['stat' => false])){
            $aResult = array();
           //print_r($aParams['items'][0]['menu']['items']);
            $aParams['items'][0]['menu']['items'][] = [
                'text' => $this->Lang_Get('plugin.freelancer.menu.orders'),
                'url'  => Router::GetPathRootWeb().'/user/'.$oUserCurrent->getId().'/orders/',
                'name' => 'create_order',
            ];

            $aParams['items'][1]['menu']['items'][] = [
                'text' => $this->Lang_Get('plugin.freelancer.menu.create_order'),
                'url'  => Router::GetPathRootWeb().'/order/add',
                'name' => 'create_order',
            ];
        }
        return array_merge(  $aParams['items']);
    }
    
    public function NotifyModal($aParams) {
        $oViewerLocal = $this->Viewer_GetLocalViewer();
        $oViewerLocal->Assign('attributes',[ 'id' => 'js-fl-notify-modal'], true);
        return $oViewerLocal->Fetch('component@freelancer:notify.modal');
    }
    
    public function IndexAfter($aParams) { echo 22;
        if($aParams['event'] == 'top'){
            $this->Viewer_Assign('periodSelectRoot', Router::GetPath('community') . 'top/');
        }
        $this->Viewer_Assign('sNavTopicsSubUrl', Router::GetPath('community') );
    }
    
    public function BlogAfter($aParams) {
        $this->Viewer_Assign('sNavTopicsSubUrl', Router::GetPath('blog') );
    }
}