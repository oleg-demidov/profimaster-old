<?php

/**
 * Регистрация хука для вывода Profi анкет
 *
 * @package application.hooks
 * @since 1.0
 */
class PluginYdirect_HookHtmlKeywords extends Hook
{
    /**
     * Регистрируем хуки
     */
    public function RegisterHook()
    {
        $this->AddHook('fl_profile_title', 'GiveKeywords', __CLASS__, 1000);        
        $this->AddHook('fl_search_meta_tags', 'GiveKeywords', __CLASS__, 1000);
    }   
    
    public function GiveKeywords($aParams) {
        $oUser = isset($aParams['oUser'])?$aParams['oUser']:null;
        
        $aSpecializations = $aParams['aSpecializations'];
        
        function getParentIds($oSpecialization , &$aParentsIds){
            if(!$oSpecialization){
                return $aParentsIds;
            }
            $aParentsIds[] = $oSpecialization->getId();
            return getParentIds($oSpecialization->getParent(), $aParentsIds);
        }
        
        $aCategoryIds = [];
        $aHtmlTitles = [];
        foreach ($aSpecializations as $oSpecialization) {
            if(!is_object($oSpecialization)){
                continue;
            }
            $aCategoryIds = getParentIds( $oSpecialization, $aCategoryIds );
            $aHtmlTitles[] = ($oSpecialization->getDescription())?$oSpecialization->getDescription():$oSpecialization->getTitle();
        }
        
        if(!sizeof($aCategoryIds)){
            return false;
        }
        
        $aParams['sHtmlDescription'] = join(', ', $aHtmlTitles);
        
        
        $aCampaigns = $this->PluginYdirect_Ydirect_GetCampaignItemsByFilter([
            '#index-from' => 'id',
            '#select' => ['t.id'], 
            '#where' => ['t.category_id IN (?a)' => [$aCategoryIds]],
            
        ]);       
        
        $aAdGroups = [];
        if($oUser){
            $aAdGroups = $this->PluginYdirect_Ydirect_GetAdGroupItemsByFilter([
                '#index-from' => 'id',
                '#select' => ['t.id'], 
                'user_id' => $oUser->getId(),
            ]); 
        }
        
        $aAdGroups[0] = 0;
        $aCampaigns[0] = 0;
        
        $aKeywords = $this->PluginYdirect_Ydirect_GetKeywordItemsByFilter([
            '#index-from' => 'value',
            '#select' => ['t.value'], 
            '#where' => [
                't.adgroup_id IN (?a) OR t.campaign_id IN (?a)' => [array_keys($aAdGroups), array_keys($aCampaigns)],
            ],
            '#group' => ['campaign_id','adgroup_id']
        ]);
        
        $aParams['sHtmlKeywords'] = join(', ', array_keys($aKeywords));
    }
}