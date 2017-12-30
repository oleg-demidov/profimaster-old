<?php
/**
 * LiveStreet CMS
 * Copyright © 2013 OOO "ЛС-СОФТ"
 *
 * ------------------------------------------------------
 *
 * Official site: www.livestreetcms.com
 * Contact e-mail: office@livestreetcms.com
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * ------------------------------------------------------
 *
 * @link http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author Maxim Mzhelskiy <rus.engine@gmail.com>
 *
 */

/**
 * Часть экшена админки по управлению ajax запросами
 */
class PluginFreelancer_ActionFauth_EventRegister extends Event
{

    public function Init()
    {
        /**
         * Устанавливаем формат ответа
         */
        //$this->Viewer_SetResponseAjax('json');
    }

    /**
     * Обработка добавления страницы
     */
    public function EventRegister()
    {
        $this->Component_Add('freelancer:auth');
        if(!$sRole = $this->GetParam(0)){
            $sRole = 'master';
        }
        $this->Session_Set('register_role', $sRole);
                
        if(isPost()){
            $sName = getRequest('name');
            $sPass = getRequest('password');
            $sEmailOrNumber = getRequest('email_or_number');
            
            $oUser = Engine::GetEntity('ModuleUser_EntityUser');
            $oUser->_setValidateScenario('freelancer_reg');
            
            /**
             * Заполняем поля (данные)
             */
            $oUser->setEmailOrNumber($sEmailOrNumber);
            $oUser->setLogin($sName);
            $oUser->setRole($this->Session_Get('register_role'));
            $oUser->setPassword($sPass);
            $oUser->setPasswordConfirm($sPass);
            $oUser->setDateRegister(date("Y-m-d H:i:s"));
            $oUser->setCaptcha(getRequestStr('captcha'));
            $oUser->setIpRegister(func_getIp());
            /**
             * Если используется активация, то генерим код активации
             */
            $oUser->setActivate(1);
            
            $this->Hook_Run('registration_validate_before', array('oUser' => $oUser));
            
            /**
             * Запускаем валидацию
             */
            if ($oUser->_Validate()) {
                print_r($oUser->_getData());
                $this->Hook_Run('registration_validate_after', array('oUser' => $oUser));
                $oUser->setPassword($this->User_MakeHashPassword($oUser->getPassword()));
                if (/*$this->User_Add($oUser)*/0) {
                    
                    if ($sCode = $this->GetInviteRegister()) {
                        $this->Invite_UseCode($sCode, $oUser);
                    }
                    
                    if($oUser->getNumber()){
                        if($iFieldId = $this->User_userFieldExistsByName('phone')){
                            $this->User_setUserFieldsValues($oUser->getId(),array($iFieldId[0]['id'] => $oUser->getNumber()));
                        }
                    }
                    $this->Hook_Run('registration_after', array('oUser' => $oUser));
                    /**
                     * Убиваем каптчу
                     */
                    $this->Session_Drop('captcha_keystring_user_signup');
                    /**
                     * Подписываем пользователя на дефолтные события в ленте активности
                     */
                    $this->Stream_switchUserEventDefaultTypes($oUser->getId());
                    $oUser = $this->User_GetUserById($oUser->getId());
                    /**
                     * Сразу авторизуем
                     */
                    $this->User_Authorization($oUser, false);
                    $this->DropInviteRegister();
                    /**
                     * Определяем URL для редиректа после авторизации
                     */
                    $sUrl = Config::Get('module.user.redirect_after_registration');
                    
                } else {
                    $this->Message_AddErrorSingle($this->Lang_Get('common.error.system.base'));
                    //return;
                }
            } else {
                $aErrors = $oUser->_getValidateErrors();
                foreach($aErrors as $sError){
                    $this->Message_AddError($sError[0]);
                }
            }
            
            $this->Viewer_Assign('sName', $sName);
            $this->Viewer_Assign('sPass', $sPass);
            $this->Viewer_Assign('sEmailOrNumber', $sEmailOrNumber);
        }
        
        $this->Viewer_Assign('sRole', $sRole);
    }
}