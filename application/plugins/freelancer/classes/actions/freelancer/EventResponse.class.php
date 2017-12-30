<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionFreelancer_EventResponse extends Event {

    public function EventAdd() 
    {
        if(!$this->oUserCurrent->isCreateResponse(['no_stat' => true])){
            $this->Message_AddError($this->Rbac_GetMsgLast(),'',true);
            Router::LocationAction('error');
        }
        $this->Component_Add('freelancer:response');
        $this->Component_Add('freelancer:user');
        $this->Component_Add('freelancer:media');
        
        $iOrderId = $this->getParam(2);
        if($oOrder = $this->PluginFreelancer_Order_GetOrderByFilter(['id'=>$iOrderId]) ){
            $this->Viewer_Assign('oOrder', $oOrder);
        }
        
        $aOrders = $this->PluginFreelancer_Order_GetOrderItemsByFilter([
            'user_id'=> $this->oUserCurrent->getId(),
            'master_id' => $this->sCurrentEvent ,
            'status'=>'end']);
        
        $iIdResp = $this->GetParam(2);
        if(!$oResponse = $this->PluginFreelancer_Freelancer_GetResponseByFilter( array('id' => $iIdResp) )){
            $oResponse = Engine::GetEntity('PluginFreelancer_ModuleFreelancer_EntityResponse');
        }
        
        $oMaster = $this->User_GetUserById($this->sCurrentEvent);    
        //$this->Viewer_Assign('oMaster', $oMaster);
        //$this->Viewer_AddBlock('right', 'component@freelancer:user.side',['oUser' => $oMaster]);       
        
        if(isPost()){
            $oResponse->setOrderId(getRequest('order_id'));
            $oResponse->setTargetId($oMaster->getId());
            $oResponse->setText(getRequest('text'));
            $oResponse->setRaiting(getRequest('raiting'));
            $oResponse->setUserId($this->oUserCurrent->getId());
            if($oResponse->_Validate()){
                if($oResponse->Save()){
                    $this->oUserCurrent->setRating($this->oUserCurrent->_getDataOne('user_rating')
                                +Config::Get('plugin.freelancer.rating.offset.create_response'));
                    $this->User_Update($this->oUserCurrent);
                    $oMaster->setRating($oMaster->_getDataOne('user_rating')
                                +Config::Get('plugin.freelancer.rating.offset.response')[$oResponse->getRaiting()-1]);
                    $this->User_Update($oMaster);
                    
                    $this->PluginFreelancer_Notify_Send($oMaster, 'response', $oResponse);
                    $this->Message_AddNotice('Успешно сохранено','',true);
                    Router::LocationAction('user/'.$oMaster->getId()); 
                }
            }else{
                foreach ($oResponse->_getValidateErrors() as $sError){
                    $this->Message_AddError($sError[0]);
                }
            }
            
        }        
        $this->Viewer_Assign('oResponse', $oResponse);
        $this->Viewer_Assign('aOrders', $aOrders);
        $this->Viewer_Assign('oMaster', $oMaster);
        $this->SetTemplateAction('response-form');
    }
    
    public function EventEdit() 
    {
        $this->Component_Add('freelancer:response');
        $this->Component_Add('freelancer:user');
        $this->Component_Add('freelancer:media');
        
        if(!$oResponse = $this->PluginFreelancer_Freelancer_GetResponseById( $this->getParam(1))){
            $this->Message_AddError("Отклик не найден", "Ошибка",true);
            Router::LocationAction('error');
        }
        
        if(!$oResponse->isAllowEdit($this->oUserCurrent)){
            $this->Message_AddError('Вы не можете редактировать этот отзыв','',true);
            Router::LocationAction('error');
        }
        
        if($oOrder = $oResponse->getOrder() ){
            $this->Viewer_Assign('oOrder', $oOrder);
        }
        
        $oTarget = $oResponse->getTarget();
        $aOrders = $this->PluginFreelancer_Order_GetOrderItemsByFilter([
            //'user_id'=> $this->oUserCurrent->getId(),
            'master_id' => $oTarget->getId() ,
            'status'=>'end']);
        //print_r($aOrders);
        //$oMaster = $this->User_GetUserById($this->sCurrentEvent);    
        //$this->Viewer_Assign('oMaster', $oMaster);
        //$this->Viewer_AddBlock('right', 'component@freelancer:user.side',['oUser' => $oMaster]);       
        
        if(isPost()){
            $oResponse->setOrderId(getRequest('order_id'));
            $oResponse->setText(getRequest('text'));
            $oResponse->setRaiting(getRequest('raiting'));
            if($oResponse->_Validate()){
                if($oResponse->Save()){
                    $this->Message_AddNotice('Успешно сохранено');
                }
            }else{
                foreach ($oResponse->_getValidateErrors() as $sError){
                    $this->Message_AddError($sError[0]);
                }
            }
            
        }  
        $oMaster = $this->User_GetUserById($oResponse->getTargetId());
        $this->Viewer_Assign('oResponse', $oResponse);
        $this->Viewer_Assign('aOrders', $aOrders);
        $this->Viewer_Assign('oMaster', $oMaster);
        $this->SetTemplateAction('response-edit');
    }
    
    public function EventRemove() {
        
        if(!$oResponse = $this->PluginFreelancer_Freelancer_GetResponseById( $this->getParam(1))){
            return Router::ActionError('Отклик не найден');
        }
        $iUserId = $oResponse->getTargetId();
        if($oResponse->Delete()){
            $this->Message_AddNotice('Успешно удален','',true);
            return Router::LocationAction('user/'.$iUserId);
        }
    }
}