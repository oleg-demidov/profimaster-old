<?php
/**
 * BlockNetworksapphelp.class.php
 * @author: Roman Revin <xgismox@gmail.com>
 * @date  : 02.07.13
 */

class PluginFreelancer_BlockDefaultGeo extends Block
{
    private $plugin;

    public function Exec()
    {
    	
    	$oGeoTarget = $this->getParam('geo_target');
       /*
         * Гео локация по умолчанию
         */
         $aDefCountries = [];
        foreach (Config::Get('plugin.freelancer.poisk.geo.countries') as $sCode){
           //print_r( $sCode);
             $aCountries = $this->Geo_GetCountries(array(    'code'=> $sCode ),    array('sort' => 'asc'), 1, 300);
              $aDefCountries = array_merge($aCountries['collection'], $aDefCountries);
         }		    		
        // print_r($aDefCountries);
                
        
        $aDefRegions = $this->Geo_GetRegions(array('country_id' => $aDefCountries[0]->_getDataOne('id')),
                    array('sort' => 'asc'), 1, 500);
        
        $aDefCities = $this->Geo_GetCities(array('country_id' => $aDefCountries[0]->_getDataOne('id')),
                    array('sort' => 'asc'), 1, 500);
        
        $aGeoId = ['country_id' => $aDefCountries[0]->_getDataOne('id')];
        
        if(!$oGeoTarget){            
            $oGeoTarget = Engine::GetEntity('ModuleGeo_EntityGeo', $aGeoId);
        }
        
        $this->Viewer_Assign('aGeoCountries', $aDefCountries);
        $this->Viewer_Assign('aGeoRegions', $aDefRegions['collection']);
        $this->Viewer_Assign('aGeoCities', $aDefCities['collection']);
        $this->Viewer_Assign('oGeoTarget', $oGeoTarget );
        
        return true;
    }
}