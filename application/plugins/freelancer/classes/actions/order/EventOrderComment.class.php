<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionOrder_EventOrderComment extends Event {

    public function AjaxResponseComment()
    {
    	
        /**
         * Устанавливаем формат Ajax ответа
         */
        $this->Viewer_SetResponseAjax('json');
        $idCommentLast = getRequestStr('last_comment_id');
        /**
         * Проверям авторизован ли пользователь
         */
        if (!$this->User_IsAuthorization()) {
            $this->Message_AddErrorSingle($this->Lang_Get('common.error.need_authorization'), $this->Lang_Get('common.error.error'));
            return;
        }
        
        
        if(!$oOrder = $this->PluginFreelancer_Order_GetOrderByFilter( [
    		'#where' => ['order_id = ?d'=>[ getRequest('target_id') ]]
    		])){
            $this->Message_AddErrorSingle($this->Lang_Get('plugin.freelancer.errors.no_order'));
            return ;
            
        }
        
        /**
         * Получаем комментарии
         */
        $aReturn = $this->Comment_GetCommentsNewByTargetId($oOrder->getOrderId(), 'order', $idCommentLast);
        $iMaxIdComment = $aReturn['iMaxIdComment'];
        
        $aComments = array();
        $aCmts = $aReturn['comments'];
        if ($aCmts and is_array($aCmts)) {
            foreach ($aCmts as $aCmt) {
                $aComments[] = array(
                    'html'     => $aCmt['html'],
                    'parent_id' => $aCmt['obj']->getPid(),
                    'id'       => $aCmt['obj']->getId(),
                );
            }
        }
        $this->Viewer_AssignAjax('comments', $aComments);
        $this->Viewer_AssignAjax('last_comment_id', $iMaxIdComment);
    }

    /**
     * Обработка добавление комментария к письму через ajax
     *
     */
    public function AjaxAddComment()
    {
    	
        /**
         * Устанавливаем формат Ajax ответа
         */
        $this->Viewer_SetResponseAjax('json');
        $this->SubmitComment();
    }

    /**
     * Обработка добавление комментария к письму
     *
     */
    protected function SubmitComment()
    {
        /**
         * Проверям авторизован ли пользователь
         */
        if (!$this->User_IsAuthorization()) {
            $this->Message_AddErrorSingle($this->Lang_Get('common.error.need_authorization'), $this->Lang_Get('common.error.error'));
            return;
        }
        /**
         * Проверяем разговор
         */
        if(!$oOrder = $this->PluginFreelancer_Order_GetOrderByFilter( [
    		'#where' => ['order_id = ?d'=>[ getRequest('comment_target_id') ]]
    		])){
            $this->Message_AddErrorSingle($this->Lang_Get('plugin.freelancer.errors.no_order'));
            return;
            
        }
       
        if($this->oUserCurrent->getId() != $oOrder->getUserId()){
            
            $aAlreadyResp = $this->Comment_GetCommentsByFilter([
                'target_type'=>'order',
                'target_id' => $oOrder->getOrderId(),
                'user_id' => $this->oUserCurrent->getId()
            ], ['comment_date' => 'desc'], 1, 20);
            
            $iCountResp = 0;
            foreach($aAlreadyResp['collection'] as $oResp){
                if(!$oResp->getCommentPid()){
                    $iCountResp++;
                }
            }
            if($iCountResp && !getRequest('reply')){
                $this->Message_AddErrorSingle($this->Lang_Get('plugin.freelancer.errors.no_create_response_more'));
                return;
            }
        }
        
        /**
         * Проверяем текст комментария
         */
        $sText = getRequestStr('comment_text');
        if (!func_check($sText, 'text', 2, 3000)) {
            $this->Message_AddErrorSingle($this->Lang_Get('talk.message.notices.error_text'), $this->Lang_Get('common.error.error'));
            return;
        }
        /**
         * Проверям на какой коммент отвечаем
         */
        $sParentId = (int)getRequest('reply');
        if (!func_check($sParentId, 'id')) {
            return $this->EventErrorDebug();
        }
        $oCommentParent = null;
        if ($sParentId != 0) {
            /**
             * Проверяем существует ли комментарий на который отвечаем
             */
            if (!($oCommentParent = $this->Comment_GetCommentById($sParentId))) {
                return $this->EventErrorDebug();
            }
            /**
             * Проверяем из одного топика ли новый коммент и тот на который отвечаем
             */
            if ($oCommentParent->getTargetId() != $oOrder->getOrderId()) {
                return $this->EventErrorDebug();
            }
        } else {
            /**
             * Корневой комментарий
             */
            $sParentId = null;
        }
        /**
         * Проверка на дублирующий коммент
         */
        if ($this->Comment_GetCommentUnique( $oOrder->getOrderId() , 'order', $this->oUserCurrent->getId(), $sParentId,
            md5($sText))
        ) {
            $this->Message_AddErrorSingle($this->Lang_Get('topic.comments.notices.spam'), $this->Lang_Get('common.error.error'));
            return;
        }
        /**
         * Создаём коммент
         */
        $oCommentNew = Engine::GetEntity('Comment');
        $oCommentNew->setTargetId($oOrder->getOrderId());
        $oCommentNew->setTargetType('order');
        $oCommentNew->setUserId($this->oUserCurrent->getId());
        $oCommentNew->setText($this->Text_Parser($sText));
        $oCommentNew->setTextSource($sText);
        $oCommentNew->setDate(date("Y-m-d H:i:s"));
        $oCommentNew->setUserIp(func_getIp());
        $oCommentNew->setPid($sParentId);
        $oCommentNew->setTextHash(md5($sText));
        $oCommentNew->setPublish(0);
        $this->Comment_AddComment($oCommentNew);
        
            /**
             * Увеличиваем число новых комментов
             */
            
    }
}