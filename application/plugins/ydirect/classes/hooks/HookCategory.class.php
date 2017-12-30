<?php

/**
 * Регистрация хука для вывода Profi анкет
 *
 * @package application.hooks
 * @since 1.0
 */
class PluginYdirect_HookCategory extends Hook
{
    /**
     * Регистрируем хуки
     */
    public function RegisterHook()
    {
       // $this->AddHook('ydirect_after_save_category', 'SaveCategory', __CLASS__, 1000);
        //$this->AddHook('ydirect_before_delete_category', 'DeleteCategory', __CLASS__, 1000);
        
        //$this->AddHook('template_user_settings_specialization_end', 'AddSettings');
        //$this->AddHook('freelancer_user_aftersave_specialization', 'SaveAdGroupUser');
        
        
    }   
    
    
    public function AddSettings($aParams) {
        $oUser = $aParams['oUser'];
        if($this->Rbac_IsAllowUser($oUser, 'ydirect', 'ydirect')){
            $oAdGroup = $this->PluginYdirect_Ydirect_GetAdGroupByUserId($oUser->getId());
            $this->Viewer_Assign('checkedYd', ($oAdGroup)?1:0);
            return $this->Viewer_Fetch('component@ydirect:specialization');
        }
    }
    
    public function SaveAdGroupUser($aParams) {
        $oUser = $aParams['oUser'];
        if($this->Rbac_IsAllowUser($oUser, 'ydirect', 'ydirect')){
            $this->PluginYdirect_Ads_AddToUser($oUser);            
        }
    }
}