<?php
/**
 * BlockNetworksapphelp.class.php
 * @author: Roman Revin <xgismox@gmail.com>
 * @date  : 02.07.13
 */

class PluginYdirect_BlockGeo extends Block
{
    private $plugin;

    public function Exec()
    {
        
        if(!$oTarget = $this->GetParam('target')){
            $oTarget = Engine::GetEntity($this->GetParam('entity'));
        }
        
        $aBeh = Config::Get('plugin.ydirect.ygeo_beh');
        $aBeh['target_type'] = strtolower(Engine::GetEntityName($oTarget));
        $oTarget->AttachBehavior('ygeo', $aBeh );
        
        $aYgeoAll = $this->PluginYdirect_Geo_GetGeoItemsAll(
                ['country_id in' => Config::Get('plugin.ydirect.default_countries')]);
       
        if(is_numeric($iGeo = getRequest('ygeo'))){           
            if(!$oYgeoCurrent = $this->PluginYdirect_Geo_GetGeoById($iGeo)){
                $oYgeoCurrent = Engine::GetEntity('PluginFreelancer_Geo_Geo');
            }
        }elseif(!$oYgeoCurrent = $oTarget->ygeo->getGeo()){
            if(is_array($aYgeoAll) and isset($aYgeoAll[0])){
                $oYgeoCurrent = $aYgeoAll[0];
            }else{
                $oYgeoCurrent = Engine::GetEntity('PluginFreelancer_Geo_Geo');
            }            
        } 
        $this->Viewer_Assign('selectedItem', $oYgeoCurrent);
        $this->Viewer_Assign('aGeoItems', $aYgeoAll); 
        $this->Viewer_Assign('label', $this->Lang_Get('user.settings.profile.fields.place.label'));
    }
    
}