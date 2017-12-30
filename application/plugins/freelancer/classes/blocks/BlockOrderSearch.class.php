<?php
/**
 * BlockNetworksapphelp.class.php
 * @author: Roman Revin <xgismox@gmail.com>
 * @date  : 02.07.13
 */

class PluginFreelancer_BlockOrderSearch extends Block
{
    private $plugin;

    public function Exec()
    {
        $this->Viewer_Assign('sAction', $this->GetParam('sAction'));
        
        $this->Viewer_Assign('oGeoTarget', $this->getGeoTarget());  
        $this->Viewer_Assign('oTarget', $this->getTarget());
        $this->Viewer_Assign('sEntity', $this->GetParam('entity'));
        
        $this->Viewer_Assign('selectItems', $this->getOrderSelectItems());
        $this->SetTemplate('component@freelancer:search');     
    }
    
    
    private function getOrderSelectItems() {
        $aItems = [
            ['value' => 'rating_desc','text' => 'сначала высокий рейтинг','type'=>'button','icon'=>'sort'],
            ['value' => 'rating_asc','text' => 'сначала низкий рейтинг','type'=>'button','icon'=>'sort'],
            ['value' => 'price_desc','text' => 'сначала дорогие','type'=>'button','icon'=>'sort'],
            ['value' => 'price_asc','text' => 'сначала дешевые','type'=>'button','icon'=>'sort']            
        ];
        
        foreach($aItems as &$Item){
            if($Item['value'] == getRequest('order')){
                $Item = array_merge($Item,['mods' => 'primary']);
            }
        }
        return $aItems;        
    }
    
    
    private function getGeoTarget() {
        if($aGeoRequest = getRequest('geo')){
            $aGeoData = [
                'country_id' => $aGeoRequest['country'],
                'region_id' => $aGeoRequest['region'],
                'city_id' => $aGeoRequest['city']];
            $oGeoTarget = Engine::GetEntity('ModuleGeo_EntityTarget', $aGeoData);
            return $oGeoTarget;
        }
        if($oUser = $this->User_GetUserCurrent()){
            $oGeoTarget = $this->Geo_GetTargetByTarget('user', $oUser->getId());
            return $oGeoTarget;
        }
        return null;
    }
    
    protected function getTarget() {
        if($oUser = $this->User_GetUserCurrent()){
           return $oUser;
        }
        return null;
    }
}