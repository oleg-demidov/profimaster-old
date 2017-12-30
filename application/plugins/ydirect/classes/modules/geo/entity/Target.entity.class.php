<?php


class PluginYdirect_ModuleGeo_EntityTarget extends EntityORM
{
    protected $aRelations = array(
        'geo'=>array(self::RELATION_TYPE_BELONGS_TO, 'PluginYdirect_ModuleGeo_EntityGeo', 'geo_id'),
        self::RELATION_TYPE_TREE
    );
    
}