<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of yd
 *
 * @author oleg
 */


class PluginYdirect_ModuleAds extends ModuleORM{
    
    public function Init() {
        parent::Init();
    }
    
    public function UpdateAdgroup() {
        $aUserIds = array_merge([0], $this->Rbac_GetUsersByPermissionCode('ydirect'));
        $aAdGroups = $this->PluginYdirect_Ydirect_GetAdGroupItemsByFilter(['#where'=>['t.user_id not in (?a)' => [$aUserIds]]]);
        foreach($aAdGroups as $oAdGroup){
            if($oAdGroup->getActive()){
                $oAdGroup->Suspend();
            }else{
                $oAdGroup->Delete();
            }
        }
        $this->UpdateAdgoupsToUsers($this->User_GetUsersByArrayId($aUserIds));
    }
    
    public function UpdateAdgoupsToUsers($aUsers = []) {
        foreach($aUsers as $oUser){
            $this->UpdateAdgoupsToUser($oUser);
        }
    }
    
    public function RemoveToUser($oUser) {
        $aAdGroups = $this->PluginYdirect_Ydirect_GetAdGroupItemsByFilter(['user_id' => $oUser->getId()]);
        foreach($aAdGroups as $oAdGroup){
            $oAdGroup->Suspend();
        }
    }
    
    public function UpdateAdgoupsToUser($oUser)
    {
        if(!$oUser){
            return;
        }
        $aGeoRegions = $oUser->ygeo->getGeos(['#index-from'=>'geo_region_id']);
        $aRegionIds = array_keys($aGeoRegions);
        
        $aSpecializations = $oUser->category->getCategories();
        
        $aCampaignIds = [0];
        foreach ($aSpecializations as $oSpec){
            if(!$oCampaign = $oSpec->getCampaign()){
                continue;
            }
            if(!$oCampaign->getActive()){
                continue;
            }
            
            $aCampaignIds[] = $oCampaign->getId();
            if(!$oAdGroup = $this->PluginYdirect_Ydirect_GetAdGroupByFilter([
                            'campaign_id' => $oCampaign->getId(), 
                            'user_id' => $oUser->getId()])){
                $oAdGroup = Engine::GetEntity('PluginYdirect_Ydirect_AdGroup');                
                $oAdGroup->setUserId($oUser->getId());
                $oAdGroup->setCampaignId($oCampaign->getId());
                $oAdGroup->setName(($oUser->getProfileName())?$oUser->getProfileName():$oUser->getLogin());
                $oAdGroup->setYcampaignId($oCampaign->getYcampaignId());
                $oAdGroup->setRegionIds($aRegionIds);
                //$oAdGroup->setKeywords();
                $oAdGroup->Save();
                continue;
            }
            
            if($oAdGroup->getActive()){
                
            }
        }
        $aAdGroups = $this->PluginYdirect_Ydirect_GetAdGroupItemsByFilter([
            '#where' => ['t.campaign_id not in (?a)' => [$aCampaignIds]],
            'user_id' => $oUser->getId()]);
        foreach($aAdGroups as $oAdGroup){
            $oAdGroup->Delete();
        }
            
    }
    
}
