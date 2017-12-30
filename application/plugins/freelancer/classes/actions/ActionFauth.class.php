<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionFauth extends ActionPlugin{
    
    protected $oUserCurrent;
    
    protected function RegisterEvent() {
        /*$this->RegisterEventExternal('Register','PluginFreelancer_ActionFauth_EventRegister');        
        $this->AddEventPreg('/^register$/i','/^(employer|master)?$/i','Register::EventRegister');
        
        $this->RegisterEventExternal('Login','PluginFreelancer_ActionFauth_EventLogin');
        $this->AddEventPreg('/^login/i','/^(employer|master)?$/i','Login::EventLogin');*/
        $this->AddEvent('ajax-login', 'EventAjaxLogin');
        $this->AddEvent('role-login-choose', 'EventRoleLoginChoose');
    }

    public function Init() {
        $this->SetDefaultEvent('login');
        $this->oUserCurrent =  $this->User_GetUserCurrent();
    }
    
    public function EventRoleLoginChoose() {
        if(!preg_match('/^.*_tmp$/',$this->oUserCurrent->getLogin())){
            Router::Location($this->oUserCurrent->getUserWebPath());
        }
        $this->oUserCurrent->setLogin(str_replace('_tmp','',$this->oUserCurrent->getLogin()));
        $this->Viewer_Assign('oUser', $this->oUserCurrent);
        
        if(isPost()){
            $this->oUserCurrent->setLogin(getRequest('login'));
            $this->oUserCurrent->_setValidateScenario('login');
            if($this->oUserCurrent->_Validate()){
                $oRole = $this->Rbac_GetRoleByCode(getRequest('role'));
                $this->Rbac_AddRoleToUser($oRole, $this->oUserCurrent);
                $this->User_Update($this->oUserCurrent);
                Router::Location($this->oUserCurrent->getUserWebPath());
            }else{
                $aErrors = $this->oUserCurrent->_getValidateErrors();
                foreach($aErrors as $aError){
                    $this->Message_AddError($aError[0]);
                }
                return;
            }
        }
    }
    public function EventAjaxLogin() {
        
        //$this->Logger_Notice('fauth');
        /**
         * Устанвливаем формат Ajax ответа
         */
        $this->Viewer_SetResponseAjax('json');
        /**
         * Логин и пароль являются строками?
         */
        if (!is_string(getRequest('email_or_number')) or !is_string(getRequest('password'))) {
            $this->Message_AddErrorSingle($this->Lang_Get('common.error.system.base'));
            return;
        }
        /**
         * Проверяем есть ли такой юзер по логину
         */
        if ((func_check(getRequest('email_or_number'),
                    'mail') and $oUser = $this->User_GetUserByMail(getRequest('email_or_number'))) 
                or $oUser = $this->User_GetUserByLogin(getRequest('email_or_number'))
                or ($this->User_IsNumber(getRequest('email_or_number')) and $oUser = $this->User_GetUserByNumber(getRequest('email_or_number')))
        ) {
            /**
             *  Выбираем сценарий валидации
             */
            $oUser->_setValidateScenario('signIn');
            /**
             * Заполняем поля (данные)
             */
            $oUser->setCaptcha(getRequestStr('captcha'));
            /**
             * Запускаем валидацию
             */
            if ($oUser->_Validate()) {
                /**
                 * Сверяем хеши паролей и проверяем активен ли юзер
                 */
                if ($this->User_VerifyAccessAuth($oUser) and $oUser->verifyPassword(getRequest('password'))) {
                    if (!$oUser->getActivate()) {
                        $this->Message_AddErrorSingle($this->Lang_Get('auth.login.notices.error_not_activated',
                            array('reactivation_path' => Router::GetPath('auth/reactivation'))));
                        return;
                    }
                    $bRemember = getRequest('remember', false) ? true : false;
                    /**
                     * Убиваем каптчу
                     */
                    $this->Session_Drop('captcha_keystring_user_auth');
                    /**
                     * Авторизуем
                     */
                    $this->User_Authorization($oUser, $bRemember);
                    /**
                     * Определяем редирект
                     */
                    $sUrl = Config::Get('module.user.redirect_after_login');
                    if (getRequestStr('return-path')) {
                        $sUrl = getRequestStr('return-path');
                    }
                    $this->Viewer_AssignAjax('sUrlRedirect', $sUrl ? $sUrl : Router::GetPath('/'));
                    return;
                }
            } else {
                /**
                 * Получаем ошибки
                 */
                $this->Viewer_AssignAjax('errors', $oUser->_getValidateErrors());
                $this->Message_AddErrorSingle(null);
                return;
            }
        }
        $this->Message_AddErrorSingle($this->Lang_Get('auth.login.notices.error_login'));
    }
}