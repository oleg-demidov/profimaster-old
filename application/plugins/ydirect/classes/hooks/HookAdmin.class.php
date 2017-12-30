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
class PluginYdirect_HookAdmin extends Hook
{
    /**
     * Регистрация необходимых хуков
     */
    public function RegisterHook()
    {
        /**
         * Хук на отображение админки
         */
        $this->AddHook('init_action_admin', 'InitActionAdmin');
        
        $this->AddHook('fix_init_category_entity', 'AttachCategoryRelation');
        $this->AddHook('template_fix_category_form_end', 'SetFormCampaign');
        $this->AddHook('fix_category_after_save', 'SaveCampaign');
        $this->AddHook('fix_category_before_delete', 'DeleteCampaign');
        $this->AddHook('action_event_admin_after', 'ActionAdmin');
        
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
            Engine::GetEntity('PluginAdmin_Ui_MenuSection')->SetCaption($this->Lang_Get('plugin.ydirect.admin.title'))->SetName('ydirect')->SetUrl('plugin/ydirect')->setIcon('line-chart')
                ->AddItem(Engine::GetEntity('PluginAdmin_Ui_MenuItem')->SetCaption($this->Lang_Get('plugin.ydirect.admin.menu.ads'))->SetUrl('adgroups'))
                ->AddItem(Engine::GetEntity('PluginAdmin_Ui_MenuItem')->SetCaption("Получить токен")->SetUrl('token'))
                //->AddItem(Engine::GetEntity('PluginAdmin_Ui_MenuItem')->SetCaption($this->Lang_Get('plugin.freelancer.admin.menu.responses'))->SetUrl('responses'))
        );
    }

    public function AttachCategoryRelation($aParam) {
        $aParam['entity']->_setRelations( [
            'campaign' => array(EntityORM::RELATION_TYPE_HAS_ONE,'PluginYdirect_ModuleYdirect_EntityCampaign','category_id')            
        ]);
    }
    
    public function SetFormCampaign($aParam) {
        if($aParam['oCategoryType']->getTargetType() != Config::Get('plugin.ydirect.category_type')){
            return false;
        }
        if(!$aParam['oCategory']){
            $aParam['oCategory']= Engine::GetEntity('Category_Category');
        }
        $this->Viewer_Assign('oCampaign', $aParam['oCategory']->getCampaign(),true);
        return $this->Viewer_Fetch('component@ydirect:campaign.form');
    }

    public function SaveCampaign($aParams) {
        
        if(Router::GetParam(0) != 'specialization'){
            return false;
        }
        if(Router::GetParam(1) == 'update'){
            if($this->Storage_Get('fl_category_save')){
                $this->Storage_Remove('fl_category_save');
                return false;
            }else{
                $this->Storage_Set('fl_category_save', 1);
            }            
        }
        //print_r($aParams['entity']);
        if(!$oCampaign = $aParams['entity']->getCampaign()){
            $oCampaign= Engine::GetEntity('PluginYdirect_Ydirect_Campaign');
        }
        if(!$sName = $aParams['entity']->getDescription()){
            $sName = $aParams['entity']->getTitle();
        }
        $oCampaign->setName($sName);
        $oCampaign->setCategoryId($aParams['entity']->getId());
        $oCampaign->setKeywords(getRequest('campaign_keywords'));
        $oCampaign->setNegativeKeywords(getRequest('campaign_negative_keywords'));
        $oCampaign->setActive(getRequest('campaign_active'));
        if(!$oCampaign->_Validate()){
            $this->Message_AddError($oCampaign->_getValidateError());
            return;
        }
        $oCampaign->Save();

    }
    
    public function ActionAdmin($aParams) {
        if($aParams['event'] == 'categories' and $aParams['params'][0] == 'specialization'){
            $this->Storage_Remove('fl_category_save');
        }
    }
    
    public function DeleteCampaign($aParams)
    {
        if($oCampaign = $aParams['entity']->getCampaign()){
            $oCampaign->Delete();
        }
    }
}