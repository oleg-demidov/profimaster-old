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
 * @link      http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author    PSNet <light.feel@gmail.com>
 *
 */
/*
 *	Работа с механизмом универсальных категорий, модуль Category
 */

class PluginYdirect_ActionAdmin_EventKeywords extends Event
{

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

}