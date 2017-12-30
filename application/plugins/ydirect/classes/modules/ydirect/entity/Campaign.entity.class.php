<?php


class PluginYdirect_ModuleYdirect_EntityCampaign extends EntityORM
{
    protected $aValidateRules=array(
        array('name','string','max'=>2000,'min'=>3),
        array('negative_keywords', 'negative_keywords')
    );
    
    protected $aRelations = array(
        'ad_groups'=>array(EntityORM::RELATION_TYPE_HAS_MANY,'PluginYdirect_ModuleYdirect_EntityAdGroup','campaign_id'),
        'ad_group'=>array(EntityORM::RELATION_TYPE_HAS_ONE,'PluginYdirect_ModuleYdirect_EntityAdGroup','campaign_id'),
        'keywords'=>array(EntityORM::RELATION_TYPE_HAS_MANY,'PluginYdirect_ModuleYdirect_EntityKeyword','campaign_id')
    );
    
    protected function beforeDelete()
    {
        if ($bResult = parent::beforeDelete()) {
            $aAdGroups = $this->getAdGroups();
            foreach ($aAdGroups as $oAdGroup){
                $oAdGroup->Delete();
            }
            $aKeywords = $this->getKeywords();
            foreach ($aKeywords as $oKeyword){
                $oKeyword->Delete();
            }
            if($this->getActive()){
                $bResult = $this->PluginYdirect_Ydirect_RemoveCampaign((int)$this->getYcampaignId());
            }
            
        }
        return $bResult;
    }
    
    public function ValidateNegativeKeywords($value) {
        $aSKeywords = preg_split("/\s?,\s?/", $value, -1, PREG_SPLIT_NO_EMPTY );
        //print_r($aSKeywords);
        foreach($aSKeywords as $sKeyword){
            if(!$this->Validate_Validate('string',$sKeyword,['max' => 100, 'min' => 3])){
                return 'Негативное ключевое слово '.$sKeyword.': '.$this->Validate_GetErrorLast();            
            }
        }
        return true;
    }
    
    protected function beforeSave()
    {
        
        if ($bResult = parent::beforeSave()) {
            
            if($this->getActive()){
                $aParams = [
                    'Name' => $this->getName(),
                    'NegativeKeywords' => [
                        'Items' => explode(',', $this->getNegativeKeywords())
                    ]
                ];
                if (!$this->getYcampaignId()) {
                    $bResult = $this->PluginYdirect_Ydirect_CreateCampaign($aParams);
                    $this->setYcampaignId($bResult[0]->Id);
                }else{
                    $bResult = $this->PluginYdirect_Ydirect_CampaignUpdate($this->getYcampaignId(),$aParams);
                }
                
            }elseif($this->getYcampaignId()){
                if($bResult = $this->PluginYdirect_Ydirect_RemoveCampaign((int)$this->getYcampaignId())){
                    $this->setYcampaignId(0);                
                }                
            }
        }
        return $bResult;
    }
    
    public function afterSave() {
        $this->KeywordsSave();
    }
    
    public function setKeywords($sKeywords) {
        $this->_setData(['keywords_for_save' => $sKeywords]);
    }
    
    public function setBid($iBid) {
        $this->_setData(['bid_for_save' => $iBid]);
    }
    
    public function getBid() {
        return $this->_getDataOne('bid_for_save');
    }
    
    public function KeywordsSave() {
        $sKeywords = $this->_getDataOne('keywords_for_save');
        $sKeywords = trim($sKeywords);
        $aSKeywords = preg_split("/\s?,\s?/", $sKeywords, -1, PREG_SPLIT_NO_EMPTY );
        $aSKeywords = array_unique($aSKeywords);
        
        $aEntityKeywords = $this->PluginYdirect_Ydirect_GetKeywordItemsByFilter([
            'campaign_id' => $this->getId(),
            '#index-from' => 'value']);
        
        foreach($aEntityKeywords as $key => $oKeywordExist){
            if(!in_array($key, $aSKeywords)){
                $oKeywordExist->Delete();
            }
        }
        
        $aKeywordsExist = array_keys($aEntityKeywords);
        foreach($aSKeywords as &$sKeyword){
            if(!in_array($sKeyword, $aKeywordsExist)){
                $oKeyword = Engine::GetEntity('PluginYdirect_Ydirect_Keyword');
                $oKeyword->setValue($sKeyword);
                $oKeyword->setCampaignId($this->getId());
                $oKeyword->setActive(0);
                if(!$oKeyword->_Validate()){
                    $this->Message_AddError($oKeyword->_getValidateError(), 'Ключевое слово '.$oKeyword->getValue());
                    continue;
                }
                $oKeyword->Save();
            }
        }       
        
        
    }
}