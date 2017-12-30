<?php
/**
 * BlockNetworksapphelp.class.php
 * @author: Roman Revin <xgismox@gmail.com>
 * @date  : 02.07.13
 */

class PluginFreelancer_BlockSearch extends Block
{
    private $plugin;

    public function Exec()
    {
        //$this->Viewer_Assign('sAction', $this->GetParam('sAction'));
        
       // $this->Viewer_Assign('oGeoTarget', $this->getGeoTarget());  
        $this->Viewer_Assign('sEntity', $this->GetParam('entity'),true);
        
        $this->Viewer_Assign('orderItems', $this->getOrderItems(), true);
        $this->SetTemplate('component@freelancer:search');     
    }
    
    private function getOrderItems() {
        $aItems = [
            ['name'=>'sort_rating','text' => 'Рейтинг'],
            ['name'=>'sort_price','text' => 'Цена'],
            ['name'=>'sort_date','text' => 'Добавлено'],
            //['name'=>'sort_bids','text' => 'По количесту откликов'],
        ];
        
        foreach($aItems as &$Item){
            $Item['value'] = getRequest($Item['name']);
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