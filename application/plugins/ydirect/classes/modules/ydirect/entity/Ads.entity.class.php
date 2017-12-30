<?php


class PluginYdirect_ModuleYdirect_EntityAds extends EntityORM
{
    protected $aValidateRules=array(
        array('title','string','max'=>33,'min'=>3, 'allowEmpty' => false),
        array('text','string','max'=>75,'min'=>10, 'allowEmpty' => false),
    );
    
    protected $aRelations = array(
        'adgroup'=>array(EntityORM::RELATION_TYPE_BELONGS_TO,'PluginYdirect_ModuleYdirect_EntityAdGroup','adgroup_id'),
    );
    
    protected function beforeDelete()
    {
        if ($bResult = parent::beforeDelete()) {
            if($this->getYadsId()){
                $bResult = $this->PluginYdirect_Ydirect_AdsDelete($this->getYadsId());
            }
        }
        return $bResult;
    }
    
    public function YdSave() {
        if (!$this->getYadsId()){
            $this->PluginYdirect_Ydirect_AdsCreate([$this]);
        }else{
            $this->PluginYdirect_Ydirect_AdsUpdate([$this]);
        }
    }
    
    public function YdModerate() {
        $this->setStatus('moderate');
        $this->PluginYdirect_Ydirect_AdsModerate([$this->getYadsId() => $this]);
        $this->Save();
    }
    
}