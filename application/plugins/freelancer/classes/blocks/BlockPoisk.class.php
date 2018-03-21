<?php
/**
 * BlockNetworksapphelp.class.php
 * @author: Roman Revin <xgismox@gmail.com>
 * @date  : 02.07.13
 */

class PluginFreelancer_BlockPoisk extends Block
{
    public function Exec()
    {
        $this->Lang_AddLangJs([
            'plugin.ymaps.field.defaultText'
        ]);
        
        $aSpecializations = $this->Category_GetCategoriesTreeByTargetType('specialization');
        
        $this->Viewer_Assign('aSpecializations', $aSpecializations, true); 
        $this->Viewer_Assign('geoLabel', 'Местоположение', true);
        
        $this->SetTemplate('component@freelancer:search-form');
    }
}