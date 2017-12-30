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
class PluginFreelancer_ActionAdmin_EventBids extends Event
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
        $this->Component_Add('freelancer:admin-bid');
        
        if(!$sStatus = $this->GetParam(0)){
            $sStatus = 'new';
        }
        
        if($sStatus == 'new'){
           $aFilter = [
                'publish' => 0,
                'delete' => 0
                ];
        }
        
        if($sStatus == 'publish'){
            $aFilter = [
                'publish' => 1,
                'delete' => 0
                ];
        }
        
        if($sStatus == 'deleted'){
            $aFilter = [
                'delete' => 1
                ];
        }
        
        $aFilter['target_type'] = 'order';
        $aFilter['target_parent_id'] = NULL;        
        $aBids = $this->Comment_GetCommentsByFilter($aFilter,[], 1, 3);
                
        $this->Viewer_Assign('aBids',$aBids['collection']);
        $this->SetTemplateAction('bids-list');
    }
        
    public function EventAjaxBidAllow() {
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        $iBidId = getRequest('bid_id');
        $oBid = $this->Comment_GetCommentById($iBidId);
        $oBid->setPublish(1);
        if($this->Comment_UpdateComment($oBid)){
            return $this->Viewer_AssignAjax('result', 1);
        }
        $this->Viewer_AssignAjax('result', 0);
        
    }
    
    public function EventAjaxBidRemove() {
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        $iBidId = getRequest('bid_id');
        $oBid = $this->Comment_GetCommentById($iBidId);
        if($oBid->getDelete()){
           if($this->Comment_DeleteCommentByTargetId($oBid->getTargetId(), $oBid->getTargetType())){
               return $this->Viewer_AssignAjax('result', 1);
           }
        }
        $oBid->setDelete(1);
        if($this->Comment_UpdateComment($oBid)){
            return $this->Viewer_AssignAjax('result', 1);
        }
        $this->Viewer_AssignAjax('iBidId', $iBidId);
        $this->Viewer_AssignAjax('result', 0);
    }
    
    public function EventAjaxBidLoad() {
        
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        if(!$sStatus = getRequest('event')){
            $sStatus = 'new';
        }
        
        if($sStatus == 'new'){
           $aFilter = [
                'publish' => 0,
                'delete' => 0
                ];
        }
        
        if($sStatus == 'publish'){
            $aFilter = [
                'publish' => 1,
                'delete' => 0
                ];
        }
        
        if($sStatus == 'deleted'){
            $aFilter = [
                'delete' => 1
                ];
        }
        
        $aFilter['target_type'] = 'order';
        $aFilter['target_parent_id'] = NULL;    
        $aBids = $this->Comment_GetCommentsByFilter($aFilter, [], 1,1);
        if(!sizeof($aBids['count'])){
           return $this->Viewer_AssignAjax('result', 0);
        }
        //print_r($aBids);
        $this->Viewer_AssignAjax('result', 1);
        $oViewer = $this->Viewer_GetLocalViewer();
        $oViewer->Assign('oBid', array_shift($aBids['collection']), true);
        $this->Viewer_AssignAjax('sBid', $oViewer->Fetch("component@freelancer:admin-bid.bid-list-item"));
    }
}