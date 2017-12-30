<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionOrder_EventOrder extends Event {
    
    private $sGeo = null;

    public function getOrderGeoStr($oOrder) {
        if(is_null($this->sGeo) and $oOrder->GetBehavior('ygeo')){
            $oGeo = $oOrder->ygeo->getGeo();
            $this->sGeo = $oGeo->getGeoRegionName();
        }
        return $this->sGeo;
    }
    
    public function AddMetaTags($oOrder) {
        $aSpecial = $oOrder->category->getCategories();
                
        $sHtmlDescription = '';
        $sHtmlKeywords = '';
        $this->Hook_Run('fl_search_meta_tags', [
            'sHtmlDescription' => &$sHtmlDescription,
            'sHtmlKeywords' => &$sHtmlKeywords, 
            'aSpecializations' => $aSpecial
                ]);        
        
        $sTitle = strip_tags( $sHtmlDescription );
                
        $this->Viewer_SetHtmlDescription( 'Заказ '.$sTitle. ' '. $this->getOrderGeoStr($oOrder) );
        
        $this->Viewer_SetHtmlKeywords( strip_tags( $sHtmlKeywords ). ' '. $this->getOrderGeoStr($oOrder) );
        
        $this->Viewer_AddHtmlTitle($this->getOrderGeoStr($oOrder));
        
        $this->Viewer_AddHtmlTitle($sTitle);       
        
    } 

    public function EventView() 
    {
        if($this->Rbac_IsAllow('master','freelancer') and !$this->Rbac_IsAllow('create_bid','freelancer')){
            $this->Message_AddError('Вы исчерпали бесплатные отклики');
        }
        
        $this->Component_Add('freelancer:order');
        $this->Component_Add('freelancer:bid');
        $this->Component_Add('freelancer:user');
        
    		
        $iIdOrder = (int)$this->sCurrentEvent;
        if(!$oOrder = $this->PluginFreelancer_Order_GetOrderByFilter(['id'=>$iIdOrder])){
            $this->Message_AddError($this->Lang_Get('plugin.freelancer.errors.no_page'),[],true);
            Router::LocationAction('error');
        }
        
        $this->AddMetaTags($oOrder);
        $this->Viewer_AddHtmlTitle($oOrder->getTitle());
        
        if(!$oOrder->isCreator($this->oUserCurrent)){
            $oOrder->setViewCount($oOrder->getViewCount()+1);
        }
        
       // $this->Viewer_AddBlock('right', 'component@freelancer:user.side',['oUser' => $oOrder->getUser()]);
        
        $this->Hook_Run('freelancer_order_edit', ['oOrder' => &$oOrder]);
        $oOrder->setDateRead(date ('Y-m-d G:i:s'));
        $oOrder->Save();
        
        $this->Viewer_AppendScript(Plugin::GetTemplateWebPath('freelancer').'assets/js/init.js');
        
              
        $this->SetTemplateAction('view');
        $this->Viewer_Assign('oOrder', $oOrder);
        $this->Viewer_Assign('oEmployer', $oOrder->getUser());
    } 
    
    public function EventRemove() {
        $iIdOrder = $this->GetParam(0);
        if(!$oOrder = $this->PluginFreelancer_Order_GetOrderByFilter(['id'=>$iIdOrder])){
            $this->Message_AddError($this->Lang_Get('plugin.freelancer.errors.no_page'),[],true);
            Router::LocationAction('order/search');
        }
        
        if(!$oOrder->isCreator($this->oUserCurrent)){
            $this->Message_AddError($this->Rbac_GetMsgLast(),'Ошибка',true);
            Router::LocationAction('error');
        }
        
        if(!$oOrder->Delete()){
            $this->Message_AddError("Не возможно удалить заказ: ".$oOrder->getTitle(), '. Системная ошибка',true);
            Router::LocationAction('order/search');
        }else{
            $this->Message_AddNotice("Заказ ".$oOrder->getTitle(). ' удален','',true);
        }
        
        Router::Location($this->oUserCurrent->getUserWebPath());
    }
        
    public function EventEdit() 
    {
        
        $this->Component_Add('freelancer:media');
        $this->Component_Add('freelancer:specialization-tabs');
        $this->Component_Add('freelancer:user');
        $this->Component_Add('freelancer:specialization');
        
        //$this->Viewer_AppendScript(Plugin::GetTemplateWebPath('freelancer').'assets/js/init.js');
        if(!$this->oUserCurrent){
            Router::ActionError($this->Lang_Get('plugin.freelancer.errors.no_auth'));
        }
        
        $iIdOrder = $this->GetParam(0);
        if(!$oOrder = $this->PluginFreelancer_Order_GetOrderByFilter( array('id' => $iIdOrder) )){
            if(!$this->oUserCurrent->isCreateOrder(['stat' => false])){
                return Router::ActionError($this->Rbac_GetMsgLast());
            }        
            $oOrder = Engine::GetEntity('PluginFreelancer_ModuleOrder_EntityOrder');
        }else{
            if($oOrder->getUserId() != $this->oUserCurrent->getId()){
                return Router::ActionError($this->Rbac_GetMsgLast());
            } 
        }
        
        $this->AddMetaTags($oOrder);
        $this->Viewer_AddHtmlTitle('Редактировать заказ '.$oOrder->getTitle());
                
        if($iMasterId = getRequest('master_id')){
            $oMaster = $this->User_GetUserById($iMasterId);
            $this->Viewer_Assign('oMaster', $oMaster);
            $aSpecializations = $oMaster->category->getCategories();
            $this->Viewer_Assign('specializations', $aSpecializations);
        }
        $this->Hook_Run('freelancer_order_edit', ['oOrder' => &$oOrder]);
        
        ///print_r($_POST);
        
        if($this->oUserCurrent){
            if(!$oGeoTarget = $this->Geo_GetTargetByTarget('order', $oOrder->getOredrId())){
                $oGeoTarget = $this->Geo_GetTargetByTarget('user', $this->oUserCurrent->getId());
            }
            
            
            $oOrder->setGeoTarget($oGeoTarget);
        }
   
        if(isPost()){
            
            $oOrder->setMedia(getRequest('media',[]));
            
            $oOrder->setTitle( getRequest('title') );
            
            $oOrder->setSpecialization( getRequest('specialization') );
                  
            $oOrder->setTextAbout( getRequest('text_about') );
            
            $oOrder->setBudjet( getRequest('budjet') );
            
            $oOrder->setMasterId( getRequest('master_id') );
            
            $oOrder->setUserId( $this->oUserCurrent->getId());
            
            if($oOrder->_Validate()){ 
                if($oOrder->Save()){ 
                    if($oOrder->_isNew()){                        
                        $this->oUserCurrent->isCreateOrder(['stat' => true]);
                        $this->oUserCurrent->setRating($this->oUserCurrent->_getDataOne('user_rating')
                                +Config::Get('plugin.freelancer.rating.offset.create_order'));
                        $this->User_Update($this->oUserCurrent); 
                        
                    }
                    if( !($oOrder->getStatus() == 'new') and ($oOrder->_getOriginalDataOne('master_id') != $oOrder->getMasterId()) ){
                        $oMaster = $oOrder->getMaster();
                        $this->PluginFreelancer_Notify_Send($oMaster, 'order', $oOrder);
                    }
                    $this->Message_AddNotice($this->Lang_Get('plugin.freelancer.saved'), [] , true);
                    //Router::Location(getRequest('back_url', Router::GetPath('order/'.$oOrder->getId())));
                }
            }else{
                foreach ($oOrder->_getValidateErrors() as $sError){
                    $this->Message_AddError($sError[0]);
                }
            }
            
        }
        
        $this->Hook_Run('order_edit_event_end');
        
        $this->Viewer_Assign('oOrder', $oOrder);
        
        $this->Viewer_Assign('oUser', $this->oUserCurrent);
        
        $this->SetTemplateAction('add');
        
        $this->Viewer_Assign('specializations',
                    $this->Category_LoadTreeOfCategory(['type_id' => 2]));
    }   
    
    public function EventChoose() {
        $iIdOrder = (int)$this->sCurrentEvent;
        $iIdResp = $this->GetParam(1);
        
        if( !$oOrder = $this->PluginFreelancer_Order_GetOrderByFilter(['id'=>$iIdOrder]) ){
            $this->Message_AddError($this->Lang_Get('plugin.freelancer.errors.no_order'),[],true);
            Router::LocationAction('order/'.$iIdOrder);
        }
        
        if( !$oBid = $this->PluginFreelancer_Order_GetBidById($iIdResp)  ){
            $this->Message_AddError($this->Lang_Get('plugin.freelancer.errors.no_response'),[],true);
            Router::LocationAction('order/'.$iIdOrder);
        }
        if(!$oOrder->isCreator($this->oUserCurrent)){
            $this->Message_AddError($this->Rbac_GetMsgLast(),'Ошибка',true);
            Router::LocationAction('error');
        }
        $oOrder->setMasterId($oBid->getUserId());
        $oOrder->setStatus('master_wait');
        if($oBid->getPrice()){$oOrder->setBudjet($oBid->getPrice());}
        
        if(!$oOrder->Save()){
            $this->Message_AddError($this->Lang_Get('common.error.save'), [] , true);
            Router::LocationAction('order/'.$iIdOrder);
        }
        $this->PluginFreelancer_Notify_Send($oOrder->getMaster(), 'order', $oOrder);
        $this->Message_AddNotice($this->Lang_Get('plugin.freelancer.saved'), [] , true);
        Router::LocationAction('order/'.$iIdOrder);
    }
    
    public function EventAcceptMaster() {
        
        $iIdOrder = (int)$this->sCurrentEvent;
        if( !$oOrder = $this->PluginFreelancer_Order_GetOrderByFilter(['id'=>$iIdOrder]) ){
            Router::ActionError($this->Lang_Get('plugin.freelancer.errors.no_order'));
        }
        
        if(!$this->oUserCurrent){
            $this->Message_AddError('Мастер не найден','Ошибка', true);
            Router::LocationAction('order/'.$iIdOrder);
        }
        
        if($oOrder->getStatus() != 'master_wait'){
            $this->Message_AddError('Заказ не ожидает подтверждения','Ошибка', true);
            Router::LocationAction('order/'.$iIdOrder);
        }
        $oOrder->setStatus('start');
        if(!$oOrder->Save()){
            $this->Message_AddError('Системная ошибка. Повторите позже','Ошибка', true);            
        }else{
            $this->Message_AddNotice('Заказ успешно стартовал. Удачного выпонения.','Сохранено', true);
            $this->PluginFreelancer_Notify_Send($oOrder->getUser(), 'order_start', $oOrder);
        }
        Router::LocationAction('order/'.$iIdOrder);
    }
    
    public function EventEnd() {
        $iIdOrder = $this->GetParam(0);
        
        if( !$oOrder = $this->PluginFreelancer_Order_GetOrderByFilter(['id'=>$iIdOrder]) ){
            $this->Message_AddError($this->Lang_Get('plugin.freelancer.errors.no_order'),'Ошибка',true);
            Router::LocationAction('error');
        }
        if(!$oOrder->isCreator($this->oUserCurrent)){
            $this->Message_AddError($this->Rbac_GetMsgLast(),'Ошибка',true);
            Router::LocationAction('error');
        }
        $oOrder->setStatus('end');
        if(!$oOrder->Save()){
            $this->Message_AddError('Системная ошибка. Повторите позже','Ошибка',true);
            Router::LocationAction('error');
        }
        if(!$oUserMaster = $oOrder->getMaster()){
            $this->Message_AddError('Системная ошибка. Повторите позже','Ошибка',true);
            Router::LocationAction('error');
        }
        Router::LocationAction('freelancer/'.$oUserMaster->getId().'/response/add/'.$oOrder->getId());
    }
    
    
    public function EventCancelMaster() {
        $iIdOrder = (int)$this->sCurrentEvent;
        if( !$oOrder = $this->PluginFreelancer_Order_GetOrderByFilter(['id'=>$iIdOrder]) ){
            $this->Message_AddError($this->Lang_Get('plugin.freelancer.errors.no_order'),[],true);
            Router::LocationAction('order/'.$oOrder->getId());
        }
        if(!$oOrder->isCreator($this->oUserCurrent)){
            $this->Message_AddError($this->Rbac_GetMsgLast(),'Ошибка',true);
            Router::LocationAction('error');
        }
        $oOrder->setMasterId(null);
        if(!$oOrder->Save()){
            $this->Message_AddError($this->Lang_Get('common.error.save'), [] , true);
            Router::LocationAction('order/'.$oOrder->getId());
        }
        $this->Message_AddNotice($this->Lang_Get('plugin.freelancer.saved'), [] , true);
        Router::LocationAction('order/'.$oOrder->getId());
    }    
    
    
    
}