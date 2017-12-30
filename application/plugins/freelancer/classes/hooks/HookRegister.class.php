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
 * Хуки
 */
class PluginFreelancer_HookRegister extends Hook
{
    /**
     * Регистрация необходимых хуков
     */
    public function RegisterHook()
    {
        /**
         * Хук на отображение админки
         */
        //$this->AddHook('init_action_admin', 'InitActionAdmin');
        /**
         * Хук на главное меню сайта
         */
        $this->AddHook('template_form_registration_begin', 'FormRegister', null, 500);
        
        //$this->AddHook('registration_validate_before', 'ValidateScenario', null, 655);
        
        //$this->AddHook('registration_after', 'RegisterAfter', null, 655);
        
        //$this->AddHook('sociality_user_create_before', 'UserCreateBefore', null, 655);
        
        //$this->AddHook('sociality_oauth_reg_end', 'RegisterOautAfter', null, 655);
        
        $this->AddHook('sociality_oauth_start', 'SocRegStart', null, 655);
        $this->AddHook('sociality_get_data', 'SocGetData', null, 655);
    }

    
    public function FormRegister($aParams)
    {
        return $this->Viewer_Fetch('component@freelancer:auth.role-buttons');
    }

    public function SocRegStart($aParams) {
        if($this->Session_Get('master_reg')){
            $aParams['returnUrl'] = Router::GetPathRootWeb();
            $aParams['returnUrlError'] = Router::GetPath('user/register_'.$this->Session_Get('role').'/reg');
        }
    }
    
    public function SocGetData($aParams) {
        if($this->Session_Get('master_reg')){
            $this->Session_Drop('master_reg');
            $this->Session_Set('dataUser', $aParams['data']);      //echo 11;      print_r($aParams['data']);
            $this->Session_Set('provider', $aParams['provider']);
            Router::Location(Router::GetPath('user/register_'.$this->Session_Get('role').'/reg'));
        }else{
            $this->Message_AddError('Вы не зарегистрированы. Выберете свою роль для регистрации','Ошибка входа', true);
            Router::Location(Router::GetPathRootWeb());
        }
    }
    
    public function ValidateScenario(&$aParams)
    {
        $aParams['oUser']->setEmailOrNumber(getRequest('email_or_number'));  
        $aParams['oUser']->setRole(getRequest('role'));
        $aParams['oUser']->_setValidateScenario('freelancer_reg');
    }
    
    public function RegisterAfter(&$aParams) {
        $oUser = $aParams['oUser'];
        if($oUser->getNumber()){
            if($iFieldId = $this->User_userFieldExistsByName('phone')){
                $this->User_setUserFieldsValues($oUser->getId(),array($iFieldId[0]['id'] => $oUser->getNumber()));
            }
        }
        
        $oRole = $this->Rbac_GetRoleByCode($oUser->getRole());
        $this->Rbac_AddRoleToUser($oRole, $oUser);
    }
    
    public function UserCreateBefore($aParams) {
        $aParams["oUser"]->setLogin($aParams["oUser"]->getLogin().'_tmp');
    }
    
    public function RegisterOautAfter($aParams) {
        $this->User_Authorization($aParams["oUser"]);
        Router::LocationAction('fauth/role-login-choose');
    }
}