<?php
/**
 * BlockNetworksapphelp.class.php
 * @author: Roman Revin <xgismox@gmail.com>
 * @date  : 02.07.13
 */

class PluginFreelancer_BlockOrdersNews extends Block
{

    public function Exec()
    {
    	
    	$oUser = $this->User_GetUserCurrent();
        if(!$oUser){
            return false;
        }
        if(!$oUser->isMaster()){
            return false;
        }
        $aCategories = $oUser->category->getCategories();
        
        if(!is_array($aCategories)){
            return false;
        }
        
        $aCategoryIds = [];
        foreach ($aCategories as $oCategory) {
            $aCategoryIds[]= $oCategory->getId();
        }
        
        $aGeo = $oUser->ygeo->getGeos();
        $aGeoIds = array_keys($aGeo);
        
        $aOrders = $this->PluginFreelancer_Order_GetOrderItemsByFilter([
            'status'=>'publish',
            '#where' => [
                't.master_id is NULL' => []
            ],
            '#ygeo' => $aGeoIds,
            '#сategory' => $aCategoryIds,
            '#limit' => 5,
            '#order' => ['fire' => 'desc']
        ]); 
        $this->Viewer_Assign('aOrders', $aOrders);
        $this->SetTemplate('component@freelancer:order.block.news');
    }
}