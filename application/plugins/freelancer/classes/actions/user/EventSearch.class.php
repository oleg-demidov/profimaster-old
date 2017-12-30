<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionUser_EventSearch extends Event {

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
                
        $this->Viewer_SetHtmlDescription( 'Мастера '.$sTitle );
        
        $this->Viewer_SetHtmlKeywords( 'заказать, сделать'.strip_tags( $sHtmlKeywords ) );
        
        $this->Viewer_AddHtmlTitle($this->getGeoStr());
        
        $this->Viewer_AddHtmlTitle('Мастера '.$sTitle);
        
    }   


    public function EventSearch() 
    {
        
        $this->Component_Add('freelancer:specialization');
        $this->Component_Add('freelancer:search');
        $this->Component_Add('freelancer:user');
        $this->Component_Add('freelancer:portfolio');
        $this->Component_Add('freelancer:master');
        
        
        
        $aOrder =[];
        
        $aOrder['field'] = $this->Rbac_GetUsersByPermissionCode('master_top');
        
        if($sOrderRating = getRequest('sort_rating')){
            $aOrder['user_rating'] = $sOrderRating;
        }
        if($sOrderDate = getRequest('sort_date')){
            $aOrder['user_date_register'] = $sOrderDate;
        }
                
                
        $iPage = $this->GetParamEventMatch(0, 2) ? $this->GetParamEventMatch(0, 2) : 1;
        $aFilter = array(
            'activate' => 1
        );
        
        /*if($aGeoRequest = getRequest('geo')){
            if ($aGeoRequest['city']) {
            $aFilter['geo_city'] = $aGeoRequest['city'];
            } elseif ($aGeoRequest['region']) {
                $aFilter['geo_region'] = $aGeoRequest['region'];
            } elseif ($aGeoRequest['country']) {
                $aFilter['geo_country'] = $aGeoRequest['country'];
            }
        }*/
        $aFilter['#category'] = getRequest('specialization');
        
        $aFilter['#page'] = $iPage;
        
        $aFilter['#ygeo'] = getRequest('ygeo');
            
        $aFilter['not_in'] = array_merge(
                [1], // админ
                $this->Rbac_GetUsersByPermissionCode('employer'),
                $this->Rbac_GetUsersByPermissionCode('manager')); 
   
        $aFreelancers = $this->User_GetUsersByFilter($aFilter, $aOrder, $iPage ,Config::Get('plugin.freelancer.poisk.per_page') );
        
        $aPaging = $this->Viewer_MakePaging($aFreelancers['count'], $iPage, Config::Get('plugin.freelancer.poisk.per_page'),
            Config::Get('plugin.freelancer.poisk.count_page_line'), Router::GetPath('user/search'), $_REQUEST);

        $this->Viewer_Assign('sActionUrl', Router::GetPath('freelancer/search'));
        $this->Viewer_Assign('aPaging', $aPaging);
        $this->Viewer_Assign('aFreelancers',$aFreelancers['collection']);
        $this->Viewer_Assign('iCount',$aFreelancers['count']);
        $this->Viewer_Assign('sMenuHeadItemSelect','master_search');
        $this->SetTemplateAction('search');
        
        $this->Viewer_Assign('specializations',
                    $this->Category_LoadTreeOfCategory(['type_id' => 2]));
    }
    
  
    
    
}