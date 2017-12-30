<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionOrder_EventOrderSearch extends Event {

    private $sGeo = null;

    public function getGeoStr() {
        if(is_null($this->sGeo) and $oGeo = $this->PluginYdirect_Geo_GetGeoByFilter(['id' => getRequest('ygeo', 107)])){
            $this->sGeo = $oGeo->getGeoRegionName();
        }
        return $this->sGeo;
    }
    
    public function Init() {
        $aSpecIds = getRequest('specialization', [0]);
        
        $aSpecial = $this->Category_GetCategoryItemsByFilter([
            'id in' => $aSpecIds
        ]);
        
        $sHtmlDescription = '';
        $sHtmlKeywords = '';
        $this->Hook_Run('fl_search_meta_tags', [
            'sHtmlDescription' => &$sHtmlDescription,
            'sHtmlKeywords' => &$sHtmlKeywords, 
            'aSpecializations' => $aSpecial
                ]);        
        
        $sTitle = strip_tags( $sHtmlDescription );
                
        $this->Viewer_SetHtmlDescription( 'Заказы и вакансии '.$sTitle );
        
        $this->Viewer_SetHtmlKeywords( strip_tags( $sHtmlKeywords ) );
        
        $this->Viewer_AddHtmlTitle($this->getGeoStr());
        
        $this->Viewer_AddHtmlTitle('Заказы '.$sTitle);
    }   
    
    public function EventSearch() 
    {
        //$this->User_SendNotifyRegistrationActivate($this->User_GetUserCurrent(), '555');
        $this->Component_Add('freelancer:specialization');
        $this->Component_Add('freelancer:order');
        $this->Component_Add('freelancer:search');
        $this->Component_Add('freelancer:user');

        /*
         * VIP. поднятие наверх
         */
        if(!$this->Rbac_IsAllow('order_search', 'freelancer')){
            $this->Message_AddError($this->Lang_Get($this->Rbac_GetMsgLast()),[],true);
            Router::LocationAction('error');
        }        
        $aFilter = [];
        $iUserTopIds = $this->Rbac_GetUsersByPermissionCode('orders_top');
        if(sizeof($iUserTopIds)){
            $aFilter['#order'] = [ '#FIELD(u.user_id,'.join(',',$iUserTopIds).')' => 'desc' ];
        }
        /*
         * Сотировка из формы
         */
        if($sSortPrice = getRequest('sort_price')){
            $aFilter['#order']['t.budjet'] = $sSortPrice;
        }
        if($sSortRating = getRequest('sort_rating')){
            $aFilter['#order']['u.user_rating'] = $sSortRating;
        }
        if($sSortDate = getRequest('sort_date')){
            $aFilter['#order']['t.date_create'] = $sSortDate;
        }
        
        $iPage = $this->GetParamEventMatch(0, 2) ? $this->GetParamEventMatch(0, 2) : 1;
        $aFilter['#page'] = array($iPage, Config::Get('plugin.freelancer.poisk.per_page'));
        
        $aOrders = $this->getOrders($aFilter);
        
        $aPaging = $this->Viewer_MakePaging($aOrders['count'], $iPage, Config::Get('plugin.freelancer.poisk.per_page'),
            Config::Get('plugin.freelancer.poisk.count_page_line'), Router::GetPath('order/search'), $_REQUEST);
        
        

        //$this->Viewer_Assign('sActionUrl', Router::GetPath('order/search'));
        $this->Viewer_Assign('paging', $aPaging);
        $this->Viewer_Assign('iCount',$aOrders['count']);
        $this->Viewer_Assign('aOrders',$aOrders['collection']); 
        $this->Viewer_Assign('sMenuHeadItemSelect','order_search');
        $this->Viewer_Assign('specializations',
                    $this->Category_LoadTreeOfCategory(['type_id' => 2]));
    }
    
    private function getOrders($aFilter) {
        
        $aFilter['#with'] = ['user','#category'];
        $aFilter['#category'] = getRequest('specialization');
        $aFilter["#join"][] = $this->PluginFreelancer_Order_GetGeoFilter(getRequest('geo'));
        $aFilter['status'] = 'publish';
        $aFilter['#where']['t.master_id is null'] = [];
        
        $this->Hook_Run('freelancer_event_search_order', ['filter' => &$aFilter]);
        
        $aFilter['#join'][] = " JOIN ".Config::Get('db.table.user')." u on t.user_id = u.user_id";
        
        /*$aFilter['#join'][] = "LEFT JOIN ".Config::Get('plugin.freelancer.table.bid')
                ." as b on t.id = b.order_id";
        $aFilter['#select'] = [ 't.*, count(b.id) as count_bids' ];
        */
        //print_r($aFilter);        
        
        return $this->PluginFreelancer_Order_GetOrderItemsByFilter($aFilter);
    }
    
    
}