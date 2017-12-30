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
        $this->Component_Add('freelancer:order');
        if(!$sStatus = $this->GetParam(0)){
            $sStatus = 'new';
        }
        $iPage = $this->GetParamEventMatch(0, 2) ? $this->GetParamEventMatch(0, 2) : 1;
    	$aOrders = $this->PluginFreelancer_Order_GetOrderItemsByFilter([
            '#where' => ['t.status = ?' => [$sStatus]],
            '#limit' => [0,10]
        ]);
                
        $this->Viewer_Assign('sStatus',$sStatus);
        $this->Viewer_Assign('aOrders',$aOrders);
        $this->SetTemplateAction('orders-list');
    }
        
    public function EventAjaxOrderAllow() {
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        $iOrderId = getRequest('order_id');
        if($oOrder = $this->PluginFreelancer_Order_GetOrderByFilter(['id'=>$iOrderId])){
            if($oOrder->getStatus() == 'publish'){
                return $this->Viewer_AssignAjax('result', 0);
            }
            if( $oOrder->getMasterId() ){
                $oOrder->setStatus('master_wait');
                $this->PluginFreelancer_Notify_Send($oOrder->getMaster(), 'order', $oOrder);
            }else{
                $oOrder->setStatus('publish');
                $this->PluginFreelancer_Notify_AddOrder($oOrder);
            }
            if($oOrder->Save()){
                return $this->Viewer_AssignAjax('result', 1);
            }
        }
        $this->Message_AddError('Заказ не найден');
        $this->Viewer_AssignAjax('result', 0);
        
    }    
    
    
    public function EventAjaxOrderRemove() {
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        $iOrderId = getRequest('order_id');
        if($oOrder = $this->PluginFreelancer_Order_GetOrderByFilter(['id'=>$iOrderId])){
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
            '#limit' => [10, 1]
        ]);
        if(!$aOrder){
           return $this->Viewer_AssignAjax('result', 0);
        }
        $this->Viewer_AssignAjax('result', 1);
        $oOrder = $aOrder[0];
        $oViewer = $this->Viewer_GetLocalViewer();
        $oViewer->Assign('isAdminka', 1);
        $oViewer->Assign('oOrder', $oOrder, true);
        $oViewer->Assign('oUserCurrent', $this->oUserCurrent);
        $this->Viewer_AssignAjax('sOrder', $oViewer->Fetch("component@freelancer:order.list-item"));
    }
}