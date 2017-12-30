<?php


class PluginYdirect_ModuleGeo_EntityGeo extends EntityORM
{
    protected $aValidateRules=array(
        array('name','string','max'=>2000,'min'=>3),
        array('average_cpc, weekly_spend_limit','number','max'=>20000,'min'=>1)
    );
    
    protected $aRelations = array(
        'targets'=>array(self::RELATION_TYPE_HAS_MANY, 'PluginYdirect_ModuleGeo_EntityTarget', 'geo_id'),
        self::RELATION_TYPE_TREE
    );
    public function getChildren() {
        return $this->PluginYdirect_Geo_GetGeoItemsByParentId($this->getGeoRegionId());
    }
    public function getParent() {
        return $this->PluginYdirect_Geo_GetGeoByGeoRegionId($this->getParentId());
    }
}