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
class PluginYdirect_ActionAds extends ActionPlugin
{

    
    
    public function Init()
    {        
        $this->SetDefaultEvent('index');  
        $this->oUserCurrent = $this->User_GetUserCurrent();        
        
    }


    protected function RegisterEvent()
    {
        $this->AddEventPreg('/^(index)?$/i','EventIndex');
              
    }

    
    public function EventIndex()
    {
        /*$this->SetTemplate(false);
        $aAds = $this->PluginYdirect_Ydirect_GetAdsItemsByFilter([ '#index-from' => 'yads_id', 'status' => 'draft']);
        print_r(array_keys($aAds));
        print_r($this->PluginYdirect_Ydirect_AdsGetById(array_keys($aAds)));*/
        
        $this->PluginYdirect_Ydirect_AdsUpdateCron();
    }
}