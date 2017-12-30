<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionFreelancer_EventAjax extends Event {
    
     public function Init()
    {
         $this->Viewer_SetResponseAjax('json');
    }

    public function EventMediaSubmitInsert()
    {
        $aIds = array(0);
        foreach ((array)getRequest('ids') as $iId) {
            $aIds[] = (int)$iId;
        }

        if (!($aMediaItems = $this->Media_GetAllowMediaItemsById($aIds))) {
            $this->Message_AddError($this->Lang_Get('media.error.need_choose_items'));
            return false;
        }

        $aParams = array(
            'align'        => getRequestStr('align'),
            'size'         => getRequestStr('size'),
            'relative_web' => true
        );
        /**
         * Если изображений несколько, то генерируем идентификатор группы для лайтбокса
         */
        if (count($aMediaItems) > 1) {
            $aParams['lbx_group'] = rand(1, 100);
        }

        $sTextResult = '';
        
        $aMedia = ['ids' => [], 'html' => ''];
        foreach ($aMediaItems as $oMedia) {
            $aMedia['ids'][] = $oMedia->getId();
            $aMedia['html'] .=  str_replace('<img', '<div class="but_close" id="'.$oMedia->getId().'">X</div><img', $this->Media_BuildCodeForEditor($oMedia, $aParams));
        }
        $this->Viewer_AssignAjax('aMedia', $aMedia);
    }
    
    public function EventMediaUploadLink()
    {
        /**
         * Пользователь авторизован?
         */
        if (!$this->oUserCurrent) {
            $this->Message_AddErrorSingle($this->Lang_Get('common.error.need_authorization'), $this->Lang_Get('common.error.error'));
            return;
        }
        /**
         * URL передали?
         */
        if (!($sUrl = getRequestStr('url'))) {
            return $this->EventErrorDebug();
        }
         /**
        * Проверяем корректность target'а
        */
        $sTargetType = getRequestStr('target_type');
        $sTargetId = getRequestStr('target_id');

        $sTargetTmp = $this->Session_GetCookie('media_target_tmp_' . $sTargetType) ? $this->Session_GetCookie('media_target_tmp_' . $sTargetType) : getRequestStr('target_tmp');
        
        if ($sTargetId) {
            $sTargetTmp = null;
            if (true !== $res = $this->Media_CheckTarget($sTargetType, $sTargetId,
                    ModuleMedia::TYPE_CHECK_ALLOW_ADD,
                    array('user' => $this->oUserCurrent))
            ) {
                $this->Message_AddError(is_string($res) ? $res : $this->Lang_Get('common.error.system.base'),
                    $this->Lang_Get('common.error.error'));
                return false;
            }
        } else {
            $sTargetId = null;
            if (!$sTargetTmp) {
                return $this->EventErrorDebug();
            }
            if (true !== $res = $this->Media_CheckTarget($sTargetType, null, ModuleMedia::TYPE_CHECK_ALLOW_ADD,
                    array('user' => $this->oUserCurrent), $sTargetTmp)
            ) {
                $this->Message_AddError(is_string($res) ? $res : $this->Lang_Get('common.error.system.base'),
                    $this->Lang_Get('common.error.error'));
                return false;
            }
        }

        
        /**
         * Выполняем загрузку файла
         */
        if ($mResult = $this->Media_UploadUrl($sUrl, $sTargetType, $sTargetId, $sTargetTmp) and is_object($mResult)
        ) {
            $aParams = array(
                //'align' => getRequestStr('align'),
                'title' => getRequestStr('title')
            );
            $aMedia = ['ids' => [$mResult->getId()], 'html' => $this->Media_BuildCodeForEditor($mResult, $aParams)];
            $aMedia['html'] = str_replace('<img', '<div class="but_close" id="'.$mResult->getId().'"></div><img', $aMedia['html']);
            $this->Viewer_AssignAjax('aMedia', $aMedia);
        } else {
            $this->Message_AddError(is_string($mResult) ? $mResult : $this->Lang_Get('common.error.system.base'),
                $this->Lang_Get('common.error.error'));
        }
    }
    
    public function EventUserPhone() {
        
    }
}