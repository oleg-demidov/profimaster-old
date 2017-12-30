<?php

class PluginFreelancer_ModuleFavourites extends ModuleORM
{
    protected $oMapper;


    public function Init()
    {
        parent::Init();
        $this->oUserCurrent = $this->User_GetUserCurrent();
        $this->oMapper = Engine::GetMapper(__CLASS__);
    }
    
    public function RewriteFilter($aFilter, $sEntityFull)
    {
        $oEntity = Engine::GetEntity($sEntityFull);
        $sTable = MapperORM::GetTableName('ModuleFavourite_EntityFavourite');
        $sTargetType = strtolower( Engine::GetEntityName($oEntity) );
        $sPimaryKey = $oEntity->_getPrimaryKey();
        
        if(!$this->oUserCurrent){
            return $aFilter;
        }
        
        if(!isset($aFilter['#join'])){
            $aFilter['#join'] = [];
        }
        
        if(isset($aFilter['#with']) and in_array('#favourites_only', $aFilter['#with'])){
            $aFilter = $this->JoinFavouritesOnly($aFilter, $sTable, $sTargetType, $sPimaryKey);
        }        
        
        $aFilter['#join'][] = "LEFT JOIN (SELECT f.target_id, count(*) as count_favourite "
                . "FROM {$sTable} as f WHERE f.target_type = '{$sTargetType}' GROUP BY f.target_id) as fc ON fc.target_id = t.{$sPimaryKey}";
        $aFilter['#select'] = ['t.*','fc.count_favourite'];
        return $aFilter;
    }
    
    public function JoinFavouritesOnly($aFilter, $sTable, $sTargetType, $sPimaryKey) {
        $aFilter['#join'][] = "JOIN {$sTable} as fav ON fav.target_id = t.{$sPimaryKey} "
        . "and fav.target_type = '{$sTargetType}' and fav.user_id = ".$this->oUserCurrent->getId();
        $this->Viewer_Assign('favFilter','only');
        return $aFilter;
    }
    
    public function GetCountFavouritesForTarget( $iUserId, $iTargetId,$sTargetType) {
        return $this->oMapper->GetCountFavouritesForTarget($iUserId, $iTargetId,$sTargetType);
    }
    
    public function AttachFavouriteToEntities($aEntities){
        if(!$this->oUserCurrent){
            return ;
        }
        foreach($aEntities as $oEntity){
            $oFavoriteTarget = $this->Favourite_GetFavourite(
                $oEntity->_getPrimaryKeyValue(), 
                strtolower(Engine::GetEntityName($oEntity)),
                $this->oUserCurrent->getId());
            $oEntity->_setData(['is_favourite' => $oFavoriteTarget] );
        }
    }

}
