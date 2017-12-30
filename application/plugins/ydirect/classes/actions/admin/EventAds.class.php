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
class PluginYdirect_ActionAdmin_EventAds extends Event
{

    public function Init()
    {
        /**
         * Устанавливаем формат ответа
         */
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
    }
    public function EventAdd() {
        if(!$this->oUserCurrent->isAdministrator()){
            $this->Message_AddError('Не администратор');
            return;
        }
        if(!$oAdGroup = $this->PluginYdirect_Ydirect_GetAdGroupById(getRequest('adGroupId'))){
            return $this->Message_AddError('Не найдена группа обьявлений');
        }
        if(!$oUser = $oAdGroup->getUser()){
            return $this->Message_AddError('Не найден пользователь');
        }
        if($oAds = $this->PluginYdirect_Ydirect_GetAdsByText(getRequest('sText'))){
            $this->Message_AddError('Дубликат');
            return;
        }
        $iCount = $this->PluginYdirect_Ydirect_GetCountItemsByFilter(['adgroup_id' => $oAdGroup->getId()],"PluginYdirect_ModuleYdirect_EntityAds");
        
        $oAds = Engine::GetEntity('PluginYdirect_Ydirect_Ads');
        $oAds->setAdgroupId($oAdGroup->getId());
        $oAds->setTitle(getRequest('sTitle'));
        $oAds->setText(getRequest('sText'));
        $oAds->setHref($oUser->getUserWebPath());
        if($oAds->_Validate()){
            if($oAds->Save()){
                $this->Message_AddNotice('Успешно сохранено');
            } 
        }else{    
            $this->Message_AddError($oAds->_getValidateError());
        }  
        
        $oViewer = $this->Viewer_GetLocalViewer();
        $oViewer->Assign('oAds', $oAds, true);
        $oViewer->Assign('num', $iCount+1, true);
        $this->Viewer_AssignAjax('html', $oViewer->Fetch('component@ydirect:admin-ads.item'));
    }
    
    public function EventRemove() {
        if(!$this->oUserCurrent->isAdministrator()){
            $this->Message_AddError('Не администратор');
            return;
        }
        if(!$oAds = $this->PluginYdirect_Ydirect_GetAdsById(getRequest('iAdsId'))){
            $this->Viewer_AssignAjax('res', 0);
            return;
        }
        if($iRes = $oAds->Delete()){
            $this->Message_AddNotice('Успешно удалено');
        }
        $this->Viewer_AssignAjax('res', $iRes);
    }


    /**
     * Обработка добавления страниц
     * ы
     */
    
   /* public function EventAdd()
    {
        if(!$oAdGroup = $this->PluginYdirect_Ydirect_GetAdGroupById($this->GetParam(1))){
            return Router::ActionError('Не найдена группа обьявлений');
        }
        if(!$oUser = $oAdGroup->getUser()){
            return Router::ActionError('Не найден пользователь');
        }
        $oAds = Engine::GetEntity('PluginYdirect_Ydirect_Ads');
        
        if(isPost()){
            $oAds->setAdgroupId($oAdGroup->getId());
            $oAds->setYadgroupId($oAdGroup->getYadgroupId());
            $oAds->setTitle(getRequest('title'));
            $oAds->setText(getRequest('text'));
            $oAds->setHref($oUser->getUserWebPath());
            $oAds->setActive(getRequest('active'));
            if($oAds->_Validate()){
                if($oAds->Save()){
                    $this->Message_AddNotice('Успешно сохранено',[],true);
                    Router::LocationAction('admin/plugin/ydirect/adgroup/edit/'.$oAdGroup->getId());
                } 
            }else{    
                $this->Message_AddError($oAds->_getValidateError());
            }            
        }
        
        $this->Viewer_Assign('oAdGroup',$oAdGroup);
        $this->Viewer_Assign('oAds',$oAds);
        $this->SetTemplateAction('ads-add');
    }
    
    public function EventEdit()
    {
        if(!$oAds = $this->PluginYdirect_Ydirect_GetAdsById($this->GetParam(1))){
            return Router::ActionError('Не найдено обьявление');
        }
        if(!$oAdGroup = $oAds->getAdgroup()){
            return Router::ActionError('Не найдена группа обьявлений');
        }        
        
        if(isPost()){
            $oAds->setTitle(getRequest('title'));
            $oAds->setText(getRequest('text'));
            $oAds->setActive(getRequest('active'));
            if($oAds->_Validate()){
                if($oAds->Save()){
                    $this->Message_AddNotice('Успешно сохранено',[],true);
                    Router::LocationAction('admin/plugin/ydirect/adgroup/edit/'.$oAdGroup->getId());
                }                
            }else{    
                $this->Message_AddError($oAds->_getValidateError());
            }            
        }
        
        $this->Viewer_Assign('oAdGroup',$oAdGroup);
        $this->Viewer_Assign('oAds',$oAds);
        $this->SetTemplateAction('ads-edit');
    }
    /*
    public function EventList()
    {
        if(!$sStatus = $this->GetParam(0)){
            $sStatus = 'new';
        }
       
        $aAdGroups = $this->PluginYdirect_Ydirect_GetAdGroupItemsByFilter([
            '#where' => 
                [
                    't.active = ?d' =>[1]
                ],
            '#join' => [
                "JOIN ".Config::Get('plugin.ydirect.table.ads')." as a ON a.adgroup_id = t.id AND a.status = ?" => [$sStatus]
            ],
            '#with' => ['user', 'ads', 'keywords'],
            '#limit' => [0,200]
        ]);
        $this->Viewer_Assign('aAdGroups',$aAdGroups);
        $this->Viewer_Assign('sStatus',$sStatus);
        $this->SetTemplateAction('ads-list');
    }
    
    public function EventEdit()
    {
        $iAdGroupId = $this->GetParam(1);
        if(!$oAdGroup = $this->PluginYdirect_Ydirect_GetAdGroupById($iAdGroupId)){
            $this->Message_AddError('No AdGroup', null, true);
            Router::Location(Router::GetPathRootWeb().'admin/plugin/ydirect/ads/0');
        }
        
        $oUser = $oAdGroup->getUser();
        if(!$aCategories = $oUser->category->getCategories()){
            $this->Message_AddError('No check categories', null, true);
            Router::Location(Router::GetPathRootWeb().'admin/plugin/ydirect/ads/0');
        }
        
        $aCampaigns = [];
        foreach($aCategories as $oCategory){
            $oCampaign = $oCategory->getCampaign();
            if($oCampaign){
                $aCampaigns[$oCampaign->getId()] = $oCampaign;
            }
        }
        if(!$iIdCampaignCurrent = $this->GetParam(2)){
            $iIdCampaignCurrent = array_values($aCampaigns)[0]->getId();
        }
        if(isPost()){
            $oAdGroup->setKeywords(getRequest('keywords')[0]);
            $oAdGroup->setYcampaignId($aCampaigns[$iIdCampaignCurrent]->getYcampaignId());
            $oAdGroup->setNegativeKeywords(getRequest('negative_keywords'));
            $oAdGroup->setActive(getRequest('active'));
            $oAdGroup->Save();
            
            $aAds = $oAdGroup->getAds();
            if(!sizeof($aAds)){
                $oAds = Engine::GetEntity('PluginYdirect_ModuleYdirect_EntityAds');
            }else{
                $oAds = $aAds[0];
            }
            $oAds->setAdgroupId($oAdGroup->getId());
            $oAds->setYadgroupId($oAdGroup->getYadgroupId());
            $oAds->setTitle(getRequest('title'));
            $oAds->setText(getRequest('text'));
            $oAds->setHref($oUser->getUserWebPath());
            $oAds->setActive(getRequest('active'));
            //print_r($oAds);
            $oAds->Save();
        }        
        
        $this->Viewer_Assign('aKeywords',$oAdGroup->getKeywords());
        $this->Viewer_Assign('iIdCampaignCurrent',$iIdCampaignCurrent);
        $this->Viewer_Assign('aCampaigns',$aCampaigns);
        $this->Viewer_Assign('oAdGroup',$oAdGroup);
        $this->Viewer_Assign('oUser',$oUser);
        $this->SetTemplateAction('ads-edit');
        
    }
    
    private function createAds(&$aParams) {
        $oAdGroup = $aParams['ad_group'];
        $oAdGroup->setName($aParams['user']->getProfileName());
        $oAdGroup->setUserId($aParams['user']->getId());
        $oAdGroup->setNegativeKeywords($aParams['n_keywords']);
        $oAdGroup->setCampaignId($aParams['campaign_id']);
        $oAdGroup->setRegionIds($aParams['region_ids']);
        $oAdGroup->setActive($aParams['bActive']);
        if(!$oAdGroup->Save()){
            $this->Message_AddError('Cant create AdGroup');
            return false;
        }
        //print_r($this->PluginYdirect_Ydirect_AdGroupList($aParams['campaign_id']));
        
        foreach($aParams['keywords'] as $oKeyword){
            $oKeyword->setAdgroupId($oAdGroup->getAdgroupId());
            $oKeyword->setActive($aParams['bActive']);
            if(!$bRes = $oKeyword->Save()){
                $this->Message_AddError('Cant create Keywords');
                return false;
            }
        }
        //print_r($this->PluginYdirect_Ydirect_KeywordsList($oAdGroup->getAdgroupId()));
        if(! $oAds = $this->PluginYdirect_Ydirect_GetAdsByAdgroupId($oAdGroup->getAdgroupId())){
            $oAds = Engine::GetEntity('PluginYdirect_ModuleYdirect_EntityAds');
        }        
        $oAds->setAdgroupId($oAdGroup->getAdgroupId());
        $oAds->setText($aParams['text']);
        $oAds->setTitle($aParams['title']);
        $oAds->setHref($aParams['user']->getUserWebPath());
        $oAds->setActive($aParams['bActive']);
        if(!$bRes = $oAds->Save()){
            $this->Message_AddError('Cant create Ads');
            return false;
        }
        return true;
    }
    
    public function EventListNew()
    {
        $aUserIds = $this->PluginYdirect_Ydirect_GetUsersByPermissionCode('ydirect');
        
        $aAdGroupStart = $this->PluginYdirect_Ydirect_GetAdGroupItemsByFilter([
            '#where' => [
                't.user_id in (?a)' => [$aUserIds],
                't.status = ?' => ['start']
            ]
        ]);
        foreach($aAdGroupStart as $oAdGroupStart){
            if(($key = array_search($oAdGroupStart->getUserId(), $aUserIds)) !== false){
                unset($aUserIds[$key]);
            }
        }
        $aUsers = $this->User_GetUsersByArrayId($aUserIds);
        $this->Viewer_Assign('aUsers',$aUsers);
        $this->SetTemplateAction('ads-list-new');
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
    }*/
}