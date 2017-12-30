<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionFreelancer_EventAjaxFavourite extends Event {
    
    public function Init()
    {
        
         $this->Viewer_SetResponseAjax('json');
    }

    public function EventToggle()
    {
         /**
         * Пользователь авторизован?
         */
        if (!$this->oUserCurrent) {
            $this->Message_AddErrorSingle($this->Lang_Get('common.error.need_authorization'), $this->Lang_Get('common.error.error'));
            return;
        }
        /**
         * Можно только добавить или удалить из избранного
         */
        /*if (!getRequest('type', null, 'post')) {
            return $this->EventErrorDebug();
        }*/
        /**
         * Топик существует?
         */
        $sEntity = getRequestStr('sEntityName');
        $oTarget = new $sEntity();
        $oTarget->setId(getRequest('iTargetId'));
        $aBehaviors = $oTarget->GetBehaviors();
        foreach ($aBehaviors as $oBehavior) {
            if ($oBehavior instanceof PluginFreelancer_ModuleFavourites_BehaviorEntity) {
                $oBehavior->setFavouriteForUser($this->oUserCurrent);
            }
        }
    }   
   
    
}