<?php
/**
 * BlockNetworksapphelp.class.php
 * @author: Roman Revin <xgismox@gmail.com>
 * @date  : 02.07.13
 */

class PluginFreelancer_BlockSearchMasters extends Block
{

    public function Exec()
    {
        
        $aUserIds = $this->Rbac_GetUsersByPermissionCode('best_master');
        if(!$iCountBest = sizeof($aUserIds)){
            return false;
        }
        
        $aFilter['#category'] = getRequest('specialization');
        
        $aFilter['#page'] = $iPage;
        
        $aFilter['#ygeo'] = getRequest('ygeo');
            
        $aFilter['not_in'] = array_merge([1],$this->Rbac_GetUsersByPermissionCode('employer'));
        
        $aFilter['id_in'] = $aUserIds;
        
        $aOrder['user_rating'] ='DESC';
   
        $aBestMasters = $this->User_GetUsersByFilter($aFilter, $aOrder, 1 ,$iCountBest );
        
        if(!$aBestMasters['count']){
            return false;
        }
        $this->Viewer_Assign('aMasters', $aBestMasters['collection'], true);
        $this->SetTemplate('component@freelancer:user.block.top-masters');
    }
}