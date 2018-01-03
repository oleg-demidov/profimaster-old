<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionUser_EventProfile extends Event {

    private $sGeo = null;

    public function getUserGeoStr($oUser) {
        if(is_null($this->sGeo) and $oUser->GetBehavior('ygeo')){
            $oGeo = $oUser->ygeo->getGeo();
            $this->sGeo = $oGeo->getGeoRegionName();
        }
        return $this->sGeo;
    }

    public function Init() { 
        $this->Component_Add('freelancer:user');
        $this->Component_Add('freelancer:phone-hide');
        
        $this->oUser = $this->User_GetUserById($this->sCurrentEvent);
        if(!$this->oUser){
            $this->oUser = $this->User_GetUserByLogin($this->sCurrentEvent);
        }
        if(!$this->oUser){
            $this->Message_AddError('Такого пользователя не существует','Ошибка', true);
            Router::LocationAction('error');
        }
         
        if($this->oUser->isManager()){
            Router::LocationAction('manager/'.$this->oUser->getLogin());            
        }
        
        $str = strip_tags( $this->oUser->getProfileAbout() );
        $this->Viewer_SetHtmlDescription(  preg_replace('/\s{2,}|\n/', '', $str ). ' '. $this->getUserGeoStr($this->oUser) );
        
        $this->Viewer_Assign('oUserCurrent', $this->oUserCurrent);
        $this->Viewer_Assign('oUser', $this->oUser);
        $this->Viewer_Assign('oUserProfile', $this->oUser);
        
        $aOrdersStart = $this->PluginFreelancer_Order_GetOrderByFilter(['status' => 'start', 'user_id' => $this->oUser->getId()]);
        if($aOrdersStart){
            $this->Message_AddNotice('У вас имеются не завершенные заказы');
        }
        $aOrdersWait = $this->PluginFreelancer_Order_GetOrderByFilter(['status' => 'master_wait', 'master_id' => $this->oUser->getId()]);
        if($aOrdersWait){
            $this->Message_AddNotice('У вас имеются не принятые заказы');
        }
    }
    
    public function EventAbout() {
        $this->Viewer_AddHtmlTitle('О себе');
        $this->Viewer_Assign('sCurrentPage', 'about');
        $this->SetTemplateAction('about');    
        $this->EndEvent();
    }

    public function EventOrders() 
    {
        $this->Component_Add('freelancer:order');
        
        $this->Viewer_AddHtmlTitle('Заказы');
        
        $aFilter = [];
        if(!$this->oUser->isEmployer()){
            //$aFilter = ['master_id' => $this->oUser->getId()];
            $aBids = $this->PluginFreelancer_Order_GetBidItemsByFilter(['user_id' => $this->oUser->getId(),'#index-from' => 'id']);
            $aFilter['#where'] = ['master_id = ? or t.id IN (?a)' => [$this->oUser->getId(),array_keys($aBids)]];
            $aFilter['status in'] = ['start', 'master_wait','end'];
        }else{
            $aFilter = ['user_id' => $this->oUser->getId()];
        }
        $aFilter['#order'] = ['date_create' => 'desc'];
        
        $iPage = $this->GetParamEventMatch(1, 2) ? $this->GetParamEventMatch(1, 2) : 1;
        $aFilter['#page'] = [$iPage, Config::Get('plugin.freelancer.poisk.per_page')];
        
        if($strReq = getRequest('favourites')){
            $aFilter['#with'] = ['#favourites_'.$strReq];
        }
        //print_r($aFilter);
        
        $aOrders = $this->PluginFreelancer_Order_GetOrderItemsByFilter($aFilter);
        
        $aPaging = $this->Viewer_MakePaging($aOrders['count'],  $iPage, Config::Get('plugin.freelancer.poisk.per_page'),
            Config::Get('plugin.freelancer.poisk.count_page_line'), Router::GetPath('user/'.$this->oUser->getId().'/orders'), $_REQUEST);
        
        $this->Viewer_Assign('paging', $aPaging);
        $this->Viewer_Assign('aOrders', $aOrders['collection']);
        $this->Viewer_Assign('sCurrentPage', 'orders');
        $this->SetTemplateAction('orders');    
        $this->EndEvent();
    }
    
    public function EventResponses() 
    {
        $this->Component_Add('freelancer:response');
        $this->Component_Add('freelancer:order');
        $this->Component_Add('admin:p-plugin');  
        
        $this->Viewer_AddHtmlTitle('Отзывы');
        
        $aFilter = ['target_id' => $this->oUser->getId()];        
        $aFilter['#order'] = ['date_create' => 'desc'];
        
        $iPage = $this->GetParamEventMatch(1, 2) ? $this->GetParamEventMatch(1, 2) : 1;
        $aFilter['#page'] = [$iPage, Config::Get('plugin.freelancer.poisk.per_page')];
        
        $aResponses = $this->PluginFreelancer_Freelancer_GetResponseItemsByFilter($aFilter);
        
        $aPaging = $this->Viewer_MakePaging($aResponses['count'], $iPage, Config::Get('plugin.freelancer.poisk.per_page'),
            Config::Get('plugin.freelancer.poisk.count_page_line'), Router::GetPath('user/'.$this->oUser->getId().'/responses'), $_REQUEST);
        
        $this->Viewer_Assign('paging', $aPaging);
        $this->Viewer_Assign('aResponses', $aResponses['collection']);
        $this->Viewer_Assign('sCurrentPage', 'responses');
        $this->SetTemplateAction('responses'); 
        $this->EndEvent();
    }
    
    public function EventPortfolio() 
    {
        
        $this->Component_Add('freelancer:masonry');  
        $this->Component_Add('freelancer:portfolio');
        
        $this->Viewer_AddHtmlTitle('Работы');
        
        $aFilter = ['user_id' => $this->oUser->getId()];        
        $aFilter['#order'] = ['date_create' => 'desc'];
        $aFilter['#with'] = ['#favourites'];
        
        $iPage = $this->GetParamEventMatch(1, 2) ? $this->GetParamEventMatch(1, 2) : 1;
        $aFilter['#page'] = [$iPage, Config::Get('plugin.freelancer.poisk.per_page')];
        
        //echo $aFilter['#page'];
        $aWorks = $this->PluginFreelancer_Portfolio_GetWorkItemsByFilter($aFilter);

        $aPaging = $this->Viewer_MakePaging($aWorks['count'], $iPage, Config::Get('plugin.freelancer.poisk.per_page'),
            Config::Get('plugin.freelancer.poisk.count_page_line'), Router::GetPath('user/'.$this->oUser->getId().'/portfolio'), $_REQUEST);
        
        $this->Viewer_Assign('aPaging', $aPaging);
        $this->Viewer_Assign('aWorks', $aWorks['collection']);
        $this->Viewer_Assign('sCurrentPage', 'portfolio');
        $this->SetTemplateAction('portfolio');  
        $this->EndEvent();
    }
    
    protected function EndEvent(){
        $this->Viewer_AddHtmlTitle($this->getUserGeoStr($this->oUser));
        
        $sHtmlKeywords = $this->sHtmlKeywords;
        
        $sHtmlTitle = '';
        $this->Hook_Run('fl_profile_title', [
            'sHtmlDescription' => &$sHtmlTitle,
            'sHtmlKeywords' => &$sHtmlKeywords, 
            'aSpecializations' => $this->oUser->category->getCategories(),
            'oUser' => $this->oUser
                ]);
        
        $this->Viewer_AddHtmlTitle('Мастер '.$sHtmlTitle);
        
        $this->Viewer_AddHtmlTitle($this->oUser->getProfileName());        
        
        $this->Viewer_SetHtmlKeywords('Заказать '. $sHtmlKeywords. ' '. $this->getUserGeoStr($this->oUser));       
        
    }
}