<?php


class PluginYdirect_ModuleYdirect_EntityAdGroup extends EntityORM
{
    protected $aValidateRules=array(
        array('name','string','max'=>2000,'min'=>3),
        array('average_cpc, weekly_spend_limit','number','max'=>20000,'min'=>1)
    );
    
    protected $aRelations = array(
        'user'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'ModuleUser_EntityUser','user_id'),
        'ads'=>array(EntityORM::RELATION_TYPE_HAS_MANY,'PluginYdirect_ModuleYdirect_EntityAds','adgroup_id'),
        'keywords'=>array(EntityORM::RELATION_TYPE_HAS_MANY,'PluginYdirect_ModuleYdirect_EntityKeyword','adgroup_id'),
        'campaign'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'PluginYdirect_ModuleYdirect_EntityCampaign','campaign_id'),
    );
    
    protected function beforeDelete()
    {
        if ($bResult = parent::beforeDelete()) {
            if($this->getYadgroupId()){
                $bResult = $this->AdGroupDelete(); 
            }
        }
        return $bResult;
    }
    
    protected function afterSave()
    {
        parent::afterSave();
        if($this->_isNew()){
            $this->KeywordsSave();
        }
    }
    
    public function YdSave() {
        if (!$this->getYadgroupId()) {   
            return $this->PluginYdirect_Ydirect_AdGroupCreate($this);
        }else{
            return $this->PluginYdirect_Ydirect_AdGroupUpdate($this);
        }
    }
    
    public function Suspend() {
        $aAds = $this->getAds([
            '#index-from' => 'yadgroup_id', 'state' => 'on',
            '#where' => ['t.yadgroup_id is not null and t.yadgroup_id != ? ' => ['']]]);
        $this->PluginYdirect_Ydirect_AdsSuspend(array_keys($aAds));
        $this->setState('suspended');
        $this->Save();
    }
    
    public function setRegionIds($aRegionIds) {
        $this->_setData(['region_ids' => serialize($aRegionIds)]);
    }
    
    public function getActive() {
        return ($this->getYadgroupId() and $this->getState() == 'on');
    }
    
    public function getRegionIds() {
        return unserialize($this->_getDataOne('region_ids'));
    }
    
    protected function AdGroupDelete() {
        if(!$this->KeywordsDelete()){
            return false;
        }
        if(!$this->AdsDelete()){
            return false;
        }
        return $this->PluginYdirect_Ydirect_AdGroupDelete($this->getYadgroupId());
    }
        
    protected function AdsDelete() {
        $aAds = $this->getAds();
        foreach($aAds as $oAds){
            if(!$oAds->Delete()){
                return false;
            }
        }
        return true ;
    }
    
    protected function KeywordsDelete() {
        $aKeywords = $this->getKeywords();
        foreach($aKeywords as $oKeyword){
            if(!$oKeyword->Delete()){
                return false;
            }
        }
        return true ;
    }
    public function getUrlEdit() {
        return Router::GetPathRootWeb().'admin/plugin/ydirect/ads/edit/'.$this->getUserId().'/'.$this->getCampaignId();
    }
    
    public function getKeywordsStr() {
        $aKeywords = $this->getKeywords(['#index-from' => 'value']);
        $aKeywords = $aKeywords?array_keys($aKeywords):[''];
        $aKeywordsCampaign = $this->getCampaign()->getKeywords([
            '#index-from' => 'value',
            '#where' => ['t.value not in (?a)'=> [$aKeywords]]
                ]);
        $aKeywordsCampaign = array_keys($aKeywordsCampaign);
        $sKeywords = join(', ', $aKeywordsCampaign).', '.join(', ', $aKeywords);
        return trim($sKeywords, ', ');
    }
    
    public function KeywordsSave() {
        if(!$oCampaign = $this->getCampaign()){
            return null;
        }
        $aKeywords = $oCampaign->getKeywords();
        foreach($aKeywords as $oCampKeyword){
            $oKeyword = Engine::GetEntity('PluginYdirect_Ydirect_Keyword');
            $oKeyword->setValue($oCampKeyword->getValue());
            $oKeyword->setAdgroupId($this->getId());
            $oKeyword->setBid(Config::Get('plugin.ydirect.default_bid'));
            $oKeyword->Save();
        }
    }
    
}