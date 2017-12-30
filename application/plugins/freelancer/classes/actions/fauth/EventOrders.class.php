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
 * Часть экшена админки по управлению ajax запросами
 */
class PluginFreelancer_ActionAdmin_EventOrders extends Event
{

    public function Init()
    {
        /**
         * Устанавливаем формат ответа
         */
        //$this->Viewer_SetResponseAjax('json');
    }

    /**
     * Обработка добавления страницы
     */
    public function EventList()
    {
        $this->Component_Add('freelancer:admin-order');
        
        if(!$sStatus = $this->GetParam(0)){
            $sStatus = 'new';
        }
        $iPage = $this->GetParamEventMatch(0, 2) ? $this->GetParamEventMatch(0, 2) : 1;
    	$aOrders = $this->PluginFreelancer_Order_GetOrderItemsByFilter([
            '#where' => ['t.status = ?' => [$sStatus]],
            '#limit' => [0,3]
        ]);
                
        $this->Viewer_Assign('aOrders',$aOrders);
        $this->SetTemplateAction('orders-list');
    }
        
    public function EventAjaxOrderAllow() {
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        $iOrderId = getRequest('order_id');
        if($oOrder = $this->PluginFreelancer_Order_GetOrderByOrderId($iOrderId)){
            $oOrder->setStatus('publish');
            if($oOrder->Save()){
                return $this->Viewer_AssignAjax('result', 1);
            }
        }
        $this->Viewer_AssignAjax('result', 0);
        
    }
    
    public function EventAjaxOrderRemove() {
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        $iOrderId = getRequest('order_id');
        if($oOrder = $this->PluginFreelancer_Order_GetOrderByOrderId($iOrderId)){
            if($oOrder->getStatus() == 'deleted'){
                $oOrder->Delete();
                return $this->Viewer_AssignAjax('result', 1);
            }
            $oOrder->setStatus('deleted');
            $this->Viewer_AssignAjax('or', 22);
            if($oOrder->Save()){
                return $this->Viewer_AssignAjax('result', 1);
            }
        }
        $this->Viewer_AssignAjax('result', 0);
    }
    
    public function EventAjaxOrderLoad() {
        
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        $sStatus = getRequest('event');
        $aOrder = $this->PluginFreelancer_Order_GetOrderItemsByFilter([
            '#with' => ['user'],
            '#where' => ['t.status = ?' => [$sStatus]],
            '#limit' => [3, 1]
        ]);
        if(!$aOrder){
           return $this->Viewer_AssignAjax('result', 0);
        }
        $this->Viewer_AssignAjax('result', 1);
        $oOrder = $aOrder[0];
        $oViewer = $this->Viewer_GetLocalViewer();
        $oViewer->Assign('oOrder', $oOrder, true);
        $this->Viewer_AssignAjax('sOrder', $oViewer->Fetch("component@freelancer:admin-order.order-list-item"));
    }
}