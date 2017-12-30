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
class PluginFreelancer_ActionAdmin_EventActions extends Event
{

    public function Init()
    {
        /**
         * Устанавливаем формат ответа
         */
        //$this->Viewer_SetResponseAjax('json');
        $this->Component_Add('freelancer:action');
    }

    /**
     * Обработка добавления страницы
     */
    public function EventList()
    {
        $iPage = $this->GetParamEventMatch(0, 2) ? $this->GetParamEventMatch(0, 2) : 1;
        
        $aActions = $this->PluginFreelancer_Market_GetActionItemsByFilter(['#page' => $iPage]);        
        
        $aPaging = $this->Viewer_MakePaging($aActions['count'], $iPage, Config::Get('plugin.freelancer.poisk.per_page'),
            Config::Get('plugin.freelancer.poisk.count_page_line'), Router::GetPath('admin/plugin/freelancer/actions'), $_REQUEST);
        
        $this->Viewer_Assign('aActions', $aActions['collection']);
        $this->Viewer_Assign('aPaging', $aPaging);
        $this->SetTemplateAction('actions');
    }
    
    public function EventEdit()
    {
        $aRolesItems = $this->Rbac_GetRoleItemsAll();
        
        $aRoles = [];
        foreach($aRolesItems as $oRole){
            $aRoles[] = ['text' => $oRole->getTitle(), 'value' => $oRole->getId()];
        }
        
        if(!$oAction = $this->PluginFreelancer_Market_GetActionById($this->GetParam(1))){
            $oAction = Engine::GetEntity('PluginFreelancer_Market_Action');
        }
            
        if(isPost()){       
            $aData = getRequest('action');
            $oAction->_setData( $aData );
            
            $oDateStart = DateTime::createFromFormat('d.m.Y', $aData['date_start']);
            $oAction->setDateStart( $oDateStart->format('Y-m-d G:i:s') );
            
            $oDateEnd = DateTime::createFromFormat('d.m.Y', $aData['date_end']);
            $oAction->setDateEnd( $oDateEnd->format('Y-m-d G:i:s') );
            if($oAction->Save()){
                $this->Message_AddNotice('Успешно сохранено','',true);
                Router::LocationAction('admin/plugin/freelancer/actions');
            }
            
        }
        
        $this->Viewer_Assign('oAction', $oAction);
        $this->Viewer_Assign('aRoles', $aRoles);
        $this->SetTemplateAction('action-edit');
    }
    
    public function EventDelete()
    {
        if( !$this->oUserCurrent->isAdministrator() ){
            return Router::ActionError('Ошибка доступа');
        }
        if(!$oAction = $this->PluginFreelancer_Market_GetActionById($this->GetParam(1))){
            return Router::ActionError('Акция не найдена');
        }
        if($oAction->Delete()){
            $this->Message_AddNotice('Успешно удалено','', true);
        }
        Router::LocationAction('admin/plugin/freelancer/actions');
    }    
}