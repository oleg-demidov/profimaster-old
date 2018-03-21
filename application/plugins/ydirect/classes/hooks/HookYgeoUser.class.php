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
class PluginYdirect_HookYgeoUser extends Hook
{
    /**
     * Регистрация необходимых хуков
     */
    public function RegisterHook()
    {
        $this->AddHook('settings_profile_save_before', 'SaveGeoUserBefore');
        //$this->AddHook('action_shutdown_settings', 'ComponentYgeoAdd');
        
        $this->AddHook('freelancer_user_init', 'AttachGeo');
        
        $this->AddHook('action_event_freelancer_after', 'ComponentAddSearchFl');
        $this->AddHook('action_event_user_after', 'ComponentAddSearchFl');
    }

    public function ComponentYgeoAdd($aParams) {
        $this->Component_Add('ydirect:geo');
    }
    
    public function ComponentAddSearchFl($aParams) {
        if($aParams['event'] == 'search'){
            //$this->Component_Add('ydirect:geo');
        }
    }
    
    public function AttachGeo($aParam) {
        $aBeh = Config::Get('plugin.ydirect.ygeo_beh');
        $aBeh['target_type'] = 'user';
        $aParam['entity']->AttachBehavior('ygeo', $aBeh );
    }
    
    public function SaveGeoUserBefore(&$aParams)
    {
        $oUser = $aParams['oUser'];
        $aGeo = getRequest('ygeo');
        if(!is_array($aGeo)){
            $aGeo = [$aGeo];
        }
        foreach($aGeo as $Geo){
            if(!$oGeoTarget = $this->PluginYdirect_Geo_GetTargetByTargetIdAndTargetType($oUser->getId(), 'user')){
                $oGeoTarget = Engine::GetEntity('PluginYdirect_Geo_Target');
            }
            $oGeoTarget->setTargetId($oUser->getId());
            $oGeoTarget->setTargetType('user');
            $oGeoTarget->setGeoId($Geo);
            $oGeoTarget->Save();     
        }
        
        $aRegionIds= [];
        $aGeo = $this->PluginYdirect_Geo_GetGeoItemsByFilter(['id in' => $aGeo]);
        foreach($aGeo as $oGeo){
            $aRegionIds[] = $oGeo->getGeoRegionId();
        }        
        
        $aAdGroups = $this->PluginYdirect_Ydirect_GetAdGroupItemsByUserId($oUser->getId());
        foreach($aAdGroups as $oAdGroup){
            $oAdGroup->setRegionIds($aRegionIds);
            $oAdGroup->Save();
        }
    }
}