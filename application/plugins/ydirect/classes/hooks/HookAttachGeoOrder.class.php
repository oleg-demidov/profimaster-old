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
class PluginYdirect_HookAttachGeoOrder extends Hook
{
    /**
     * Регистрация необходимых хуков
     */
    public function RegisterHook()
    {
        $this->AddHook('template_freelancer_order_form', 'FormGeo');
        //$this->AddHook('freelancer_order_edit', 'AttachGeoOrder');
        $this->AddHook('freelancer_init_order_module', 'AttachGeoOrderModule');
        
        $this->AddHook('template_freelancer_search_form', 'FormGeo');
        //$this->AddHook('freelancer_event_search_order', 'AttachFilterSearch');
    }

    public function FormGeo($aParams)
    {
        $oTarget = $aParams['target'];
        $aYgeoAll = $this->PluginYdirect_Geo_GetGeoItemsAll(
                ['country_id in' => Config::Get('plugin.ydirect.default_countries')]);
        
        if(is_numeric($iGeo = getRequest('ygeo'))){           
            if(!$oYgeoCurrent = $this->PluginYdirect_Geo_GetGeoById($iGeo)){
                $oYgeoCurrent = Engine::GetEntity('PluginFreelancer_Geo_Geo');
            }
        }elseif($oTarget and property_exists($oTarget, 'ygeo')){
            $oYgeoCurrent = $oTarget->ygeo->getGeo();
        }else{
            if(is_array($aYgeoAll) and isset($aYgeoAll[0])){
                $oYgeoCurrent = $aYgeoAll[0];
            }else{
                $oYgeoCurrent = Engine::GetEntity('PluginFreelancer_Geo_Geo');
            }            
        }
        
        $this->Viewer_Assign('selectedItem', $oYgeoCurrent,true);
        $this->Viewer_Assign('aGeoItems', $aYgeoAll,true); 
        $this->Viewer_Assign('label', $this->Lang_Get('user.settings.profile.fields.place.label'),true);
        return $this->Viewer_Fetch('component@ydirect:geo');
    }
    
    public function AttachGeoOrder($aParams)
    {
        $this->Component_Add('ydirect:geo');
        $oOrder = $aParams['oOrder'];
        $aBeh = Config::Get('plugin.ydirect.ygeo_beh');
        $aBeh['target_type'] = 'order';
        $oOrder->AttachBehavior('ygeo', $aBeh );
    }
    public function AttachGeoOrderModule($aParams)
    {   
        $oOrder = $aParams['module'];        
        $aBeh = Config::Get('plugin.ydirect.ygeo_beh_module');
        $aBeh['target_type'] = 'order';
        $oOrder->AttachBehavior('ygeo', $aBeh );
    }
    
    public function AttachFilterSearch($aParams)
    {   
        $this->Component_Add('ydirect:geo');
        unset($aParams['filter']['#join']);
        $aParams['filter']['#ygeo'] = getRequest('ygeo');
    }
}