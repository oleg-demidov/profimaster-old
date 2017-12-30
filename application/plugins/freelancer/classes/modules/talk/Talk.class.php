<?php
class PluginFreelancer_ModuleTalk extends PluginFreelancer_Inherit_ModuleTalk
{
    
    public function SendNotifyTalkNew(
        ModuleUser_EntityUser $oUserTo,
        ModuleUser_EntityUser $oUserFrom,
        ModuleTalk_EntityTalk $oTalk
    ) {
        $this->PluginFreelancer_Notify_Send($oUserTo, 'talk',$oTalk);
        return true;
    }

    /**
     * Отправляет уведомление о новом сообщение в личке
     *
     * @param ModuleUser_EntityUser $oUserTo Объект пользователя, которому отправляем уведомление
     * @param ModuleUser_EntityUser $oUserFrom Объект пользователя, которыф написал комментарий
     * @param ModuleTalk_EntityTalk $oTalk Объект сообщения
     * @param ModuleComment_EntityComment $oTalkComment Объект комментария
     * @return bool
     */
    public function SendNotifyTalkCommentNew(
        ModuleUser_EntityUser $oUserTo,
        ModuleUser_EntityUser $oUserFrom,
        ModuleTalk_EntityTalk $oTalk,
        ModuleComment_EntityComment $oTalkComment
    ) {
        $this->PluginFreelancer_Notify_Send($oUserTo, 'talk',$oTalk);
        return true;
    }
}