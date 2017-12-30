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
class PluginYdirect_ActionAdmin_EventAdGroups extends Event
{

    public function Init()
    {
        /**
         * Устанавливаем формат ответа
         */
        //$this->Viewer_SetResponseAjax('json');
        $this->Component_Add('ydirect:adgroup');
    }

    /**
     * Обработка добавления страницы
     */
    public function EventList()
    {
        if(!$iActive = $this->GetParam(0)){
            $iActive = null;
        }
        
        $aFilter = [
            'status' => $iActive,
            '#with' => ['user', 'ads', 'keywords'],
            '#limit' => [0,200]
        ];
        $sState = $this->GetParam(1);
                
           
        if($iActive == 'accepted' and $sState != 'suspended'){
            $aFilter['#where'] = ['t.state != ?' => ['suspended']];
        }
        
        if($sState){
            $aFilter['state'] = $sState;            
            $iActive = $sState;
        }
        
        $aAdGroups = $this->PluginYdirect_Ydirect_GetAdGroupItemsByFilter($aFilter);
        
        $this->Viewer_Assign('countNew', $this->GetCountAdGroupByStatus(null));
        $this->Viewer_Assign('countDraft', $this->GetCountAdGroupByStatus('draft'));
        $this->Viewer_Assign('countModeration', $this->GetCountAdGroupByStatus('moderation'));
        $this->Viewer_Assign('countAccepted', $this->GetCountAdGroupByStatus('accepted',
                ['#where' => ['t.state != ?' => ['suspended']]]));
        $this->Viewer_Assign('countSuspended', $this->GetCountAdGroupByStatus('accepted',['state' => 'suspended']));
        $this->Viewer_Assign('countRejected', $this->GetCountAdGroupByStatus('rejected'));
        
        
        $this->Viewer_Assign('aAdGroups',$aAdGroups);
        $this->Viewer_Assign('iActive',$iActive);
        $this->SetTemplateAction('adgroup-list');
    }
    
    public function GetCountAdGroupByStatus($iActive, $aFilter = []) {
        return $this->PluginYdirect_Ydirect_GetCountItemsByFilter(array_merge([
            'status' => $iActive,
        ],$aFilter) , 'PluginYdirect_ModuleYdirect_EntityAdGroup');
    }
    
    public function EventEdit()
    {
        $this->Component_Add('user');
        $iAdGroupId = $this->GetParam(1);
        if(!$oAdGroup = $this->PluginYdirect_Ydirect_GetAdGroupById($iAdGroupId)){
            $this->Message_AddError('No AdGroup', null, true);
            Router::LocationAction('admin/plugin/ydirect/adgroups');
        }
        if(!$oCampaign = $oAdGroup->getCampaign()){
            $this->Message_AddError('No Campaign', null, true);
            Router::LocationAction('admin/plugin/ydirect/adgroups');
        }
        
        if(isPost()){
            $oAdGroup->setName(getRequest('name'));
            $oAdGroup->setYcampaignId($oCampaign->getYcampaignId());
            
            if(getRequest('active')){
                $oAdGroup->YdSave();
                
                $aKeywords = $oAdGroup->getKeywords([
                    '#index-from' => 'yadgroup_id', 
                    '#where' => ['t.ykeyword_id is null or t.ykeyword_id = ?' => ['']]]);
                $this->PluginYdirect_Ydirect_KeywordsCreate($aKeywords);
                
                $aAdsNew = $oAdGroup->getAds([ 'status' => 'new']);
                $this->PluginYdirect_Ydirect_AdsCreate($aAdsNew);
                
                $aAdsNew = $oAdGroup->getAds(['#index-from' => 'yads_id', 'status in' => ['draft','rejected']]);
                $this->PluginYdirect_Ydirect_AdsModerate($aAdsNew);
                
                $aAdsSuspend = $oAdGroup->getAds(['#index-from' => 'yads_id', 'state in' => ['suspended']]);
                $this->PluginYdirect_Ydirect_AdsResume(array_keys($aAdsSuspend));
                $oAdGroup->setState('on');
                $oAdGroup->Save();
            }else{
                $oAdGroup->Suspend();
            }
        }        
        $this->Viewer_Assign('oAdGroup',$oAdGroup);        
        $this->SetTemplateAction('adgroup-edit');
        
    }
    
}