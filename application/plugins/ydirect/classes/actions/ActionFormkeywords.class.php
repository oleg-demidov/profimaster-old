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
class PluginYdirect_ActionFormkeywords extends ActionPlugin
{

    
    
    public function Init()
    {        
        $this->SetDefaultEvent('index');  
        $this->oUserCurrent = $this->User_GetUserCurrent();        
    }


    protected function RegisterEvent()
    {
        $this->AddEventPreg('/^(index)?$/i','EventIndex');
        $this->AddEventPreg('/^add$/i','EventAdd');
        $this->AddEventPreg('/^remove$/i','EventRemove');
    }

    public function EventAdd() {
        if(!$this->oUserCurrent->isAdministrator()){
            $this->Message_AddError('Не администратор');
            return;
        }
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        if($oKeyword = $this->PluginYdirect_Ydirect_GetKeywordByValue(getRequest('sKeyword'))){
            $this->Message_AddError('Дубликат');
            return;
        }
        $oKeyword = Engine::GetEntity('PluginYdirect_Ydirect_Keyword');
        $oKeyword->setValue(getRequest('sKeyword'));
        $oKeyword->setAdgroupId(getRequest('adGroupId'));
        $oKeyword->setBid(Config::Get('plugin.ydirect.default_bid'));
        $oKeyword->Save();
        
        $oViewer = $this->Viewer_GetLocalViewer();
        $oViewer->Assign('oKeyword', $oKeyword, true);
        $this->Viewer_AssignAjax('html', $oViewer->Fetch('component@ydirect:keywords.item'));
    }
    
    public function EventRemove() {
        if(!$this->oUserCurrent->isAdministrator()){
            $this->Message_AddError('Не администратор');
            return;
        }
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        if(!$oKeyword = $this->PluginYdirect_Ydirect_GetKeywordById(getRequest('iKeywordId'))){
            $this->Viewer_AssignAjax('res', 0);
        }
        $this->Viewer_AssignAjax('res', $oKeyword->Delete());
    }
    
    public function EventIndex()
    {
        $this->SetTemplate(false);
        $this->Viewer_SetResponseAjax('json');
        
        $aUserIds = $this->PluginYdirect_Ydirect_GetUsersByPermissionCode('ydirect');
        if(!in_array($this->oUserCurrent->getId(), $aUserIds)){
            $oViewer = $this->Viewer_GetLocalViewer();
            $oViewer->Assign('text', $this->Lang_Get('plugin.ydirect.error.no_ydirect_permission'), true);
            $this->Viewer_AssignAjax('form', $oViewer->Fetch('component@blankslate'));
            return;
        }        
        
        $aCategoryIds = getRequest('category_id');
        $aCampaigns = $this->PluginYdirect_Ydirect_GetCampaignItemsByFilter(['category_id in'  => $aCategoryIds, 'active' => 1]);
        if(sizeof($aCampaigns)){
            $oViewer = $this->Viewer_GetLocalViewer();
            $oViewer->Assign('aCampaigns', $aCampaigns, true);
            $this->Viewer_AssignAjax('form', $oViewer->Fetch('component@ydirect:keywords.ajax'));
        }else{            
            $oViewer = $this->Viewer_GetLocalViewer();
            $oViewer->Assign('text', $this->Lang_Get('plugin.ydirect.notice.no_campaigns_to_categories'), true);
            $this->Viewer_AssignAjax('form', $oViewer->Fetch('component@blankslate'));
        }
        
     }
}