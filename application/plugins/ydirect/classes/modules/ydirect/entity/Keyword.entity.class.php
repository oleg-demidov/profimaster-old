<?php


class PluginYdirect_ModuleYdirect_EntityKeyword extends EntityORM
{
    protected $aValidateRules=array(
        array('bid','number','max'=>30,'min'=>1),
        array('value','string','max'=>50,'min'=>3),
    );
    
    protected $aRelations = array(
        'adgroup'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'PluginYdirect_ModuleYdirect_EntityAdGroup','adgroup_id'),
    );
    
    protected function beforeDelete()
    {
        if ($bResult = parent::beforeDelete()) {
            if($this->getYkeywordId()){
                $bResult =$this->PluginYdirect_Ydirect_KeywordsDelete($this->getYkeywordId());
            }
        }
        return $bResult;
    }
    
    public function YdSave() {
        if (!$this->getYkeywordId()){
            $this->PluginYdirect_Ydirect_KeywordsCreate([$this]);
        }else{
            $this->PluginYdirect_Ydirect_KeywordsUpdate($this);
        }
    }    
    
    public function getBid() {
        if(!$nBid = $this->_getDataOne('bid')){
            $nBid = Config::Get('plugin.ydirect.default_bid');
        }
        return $nBid;
    }
    
}