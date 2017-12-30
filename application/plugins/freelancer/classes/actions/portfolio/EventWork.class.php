<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionPortfolio_EventWork extends Event {

    private $oUser;

    public function Init() {
        $this->Viewer_Assign('oUserCurrent', $this->oUserCurrent);
    }

    public function EventEdit() 
    {
        
        
        $this->Component_Add('freelancer:portfolio');
        $this->Component_Add('freelancer:media');

        if(!$oWork = $this->PluginFreelancer_Portfolio_GetWorkById( $this->GetParam(1) )){
            $oWork = Engine::GetEntity('PluginFreelancer_Portfolio_Work');
            if(!$this->Rbac_IsAllow('create_portfolio','freelancer')){
                return Router::ActionError($this->Rbac_GetMsgLast(),'Ошибка доступа');
            }
        }elseif($oWork->getUserId() != $this->oUserCurrent->getId() and !$this->oUserCurrent->isAdministrator()){
            return Router::ActionError('Вы не можете редактировать эту работу','Ошибка доступа');
        }
        
        $aWorks = $this->PluginFreelancer_Portfolio_GetWorkItemsByFilter([
            'user_id' => $this->oUserCurrent->getId(),
            '#index-from' => 'order_id'
        ]);
                        
        $aOrders = $this->PluginFreelancer_Order_GetOrderItemsByFilter([
            'master_id' => $this->oUserCurrent->getId(),
            '#where' => [
                't.order not in ?a' => [array_keys($aWorks)]
            ],
            'status' => 'done'
        ]);    
        
        if(isPost()){
            $oWork->setTitle(getRequest('title'));
            $oWork->setText(getRequest('text'));
            $oWork->setUserId($this->oUserCurrent->getId());
            if($oWork->_Validate()){
                if($oWork->_isNew() and !$this->Rbac_IsAllow('create_portfolio','freelancer',['stat' => true])){
                    return Router::ActionError($this->Rbac_GetMsgLast(),'Ошибка доступа');
                }
                if($oWork->Save()){
                    if($oWork->_isNew()){                        
                        $this->oUserCurrent->setRating($this->oUserCurrent->_getDataOne('user_rating')
                                +Config::Get('plugin.freelancer.rating.offset.create_portfolio'));
                        $this->User_Update($this->oUserCurrent); 
                    }
                    $this->Message_AddNotice('Успешно сохранено','',true);
                    if($sPath = getRequest('back')){
                        Router::Location($sPath);
                    }
                    Router::LocationAction('user/'.$this->oUserCurrent->getId().'/portfolio');
                }else{
                    $this->Message_AddError($this->Lang_Get('common.error.save'), $this->Lang_Get('common.error.error'));
                }
            }else{
                $this->Message_AddError($oWork->_getValidateError(), $this->Lang_Get('common.error.error'));
            }
        }
        
        $this->Viewer_Assign('aOrders', $aOrders);
        $this->Viewer_Assign('oWork', $oWork);
        $this->SetTemplateAction('work-add');
    }
    
    public function EventDelete() 
    {
        if(!$oWork = $this->PluginFreelancer_Portfolio_GetWorkById( $this->GetParam(1) )){
            $this->Message_AddError('Работа не найдена','',true);
            if($sPath = getRequest('back')){
                Router::Location($sPath);
            }
        }
        if($oWork->getUserId() != $this->oUserCurrent->getId() and !$oUser->isAdministrator()){
            $this->Message_AddError('У вас нет прав на удаление','',true);
            if($sPath = getRequest('back')){
                Router::Location($sPath);
            }
        }
        if($oWork->Delete()){
            $this->Rbac_IsAllow('create_portfolio', 'freelancer', ['stat_off' => -1]);
            $this->Message_AddNotice('Успешно удалено','',true);
            if($sPath = getRequest('back')){
                Router::Location($sPath);
            }
        }
    }
}