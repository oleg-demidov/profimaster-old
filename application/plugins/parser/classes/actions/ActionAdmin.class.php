<?php

class PluginParser_ActionAdmin extends PluginAdmin_ActionPlugin
{

    
    public $oUserCurrent;

    public function Init()
    {
        $this->oUserCurrent = $this->User_GetUserCurrent();
    }

    /**
     * Регистрируем евенты
     *
     */
    protected function RegisterEvent()
    {
        $this->AddEventPreg('/^user_add$/i', 'EventUserAdd');
    }

    /**
     *    Вывод списка страниц
     */
    protected function EventUserAdd()
    {
        $this->Component_Add('ydirect:geo');
        $aData = $_REQUEST;
        if(isset($aData['phone'])){
            $aData['phone'] = str_replace(' ', '', $aData['phone']);
        }
        $this->Viewer_Assign('aUserData', $aData);
        $this->SetTemplateAction('form');
        
        if(isPost()){
            if(!$oInviter = $this->User_GetUserByLogin(getRequest('inviter'))){
                $this->Message_AddError('Не найден приглашающий');
                return;
            }
            $aData['invite_code'] = $oInviter->getReferralCode();
            
            $aData['role'] = 'master';
            $aData['pass'] = rand(1000, 9999);
            $this->AddUser($aData);
        }
    }
    
    public function AddUser($aUserData) {
        $oUser = Engine::GetEntity('ModuleUser_EntityUser');
        
        $sLogin = $this->PluginFreelancer_Freelancer_Rus2Translit($aUserData['name']);
        $oUser = Engine::GetEntity('ModuleUser_EntityUser');
        $oUser->_setValidateScenario('login_exist');
        $oUser->setLogin($sLogin);
        while(!$oUser->_Validate()){
            $oUser->setLogin($sLogin . rand(1, 99));
        }
        
        $oUser->_setValidateScenario('freelancer_reg');
        /**
         * Заполняем поля (данные)
         */
        $oUser->setRole($aUserData['role']);
        //$oUser->setLogin($aUserData['login']);
        $oUser->setEmailOrNumber($aUserData['phone']);
        $oUser->setPassword($aUserData['pass']);
        $oUser->setPasswordConfirm($aUserData['pass']);
        $oUser->setProfileAbout($aUserData['text']);
        //$oUser->setCaptcha(getRequestStr('g-recaptcha-response'));
        $oUser->setProfileName($aUserData['name']);
        $oUser->setDateRegister(date("Y-m-d H:i:s"));
        $oUser->setIpRegister(func_getIp());
        $oUser->setActivate(1);        
        
        
        if ($oUser->_Validate()) {
            $oUser->setPassword($this->User_MakeHashPassword($oUser->getPassword()));
            
            if ($this->User_Add($oUser)) {
                $oRole = $this->Rbac_GetRoleByCode($aUserData['role']);
                $this->Rbac_AddRoleToUser($oRole, $oUser);
                $this->User_Update($oUser);
                
                $this->User_SetDefaultSettings($oUser);
                
                $this->Invite_UseCode($aUserData['invite_code'], $oUser);
                
                $this->Stream_switchUserEventDefaultTypes($oUser->getId());
                
                $oUser->setYGeo($aUserData['ygeo']);
                $oUser->ygeo->CallbackAfterSave();
                
                if(isset($aUserData['imgs'][0]) and $sPathPhoto = $this->PluginSociality_Oauth_GetPhotoByUrl($aUserData['imgs'][0])){

                    if($this->User_CreateProfilePhoto($sPathPhoto, $oUser)){

                        $this->User_CreateProfileAvatar($oUser->getProfileFoto(), $oUser);
                    }

                    $this->Fs_RemoveFileLocal($sPathPhoto);
                    unset($aUserData['imgs'][0]);
                }
                
                foreach($aUserData['imgs'] as $key=>$sUrlImg){
                    if($key>3){
                        break;
                    }
                    if(!$oMedia = $this->Media_UploadUrl($sUrlImg, 'user', $oUser->getId())){
                        continue;
                    }
                    $oWork = Engine::GetEntity('PluginFreelancer_Portfolio_Work');
                    $oWork->setMedia([$oMedia->getId()]);
                    $oWork->setTitle($key);
                    $oWork->setUserId($oUser->getId());
                    $oWork->Save();
                }
                
                if($oUser->getStrRole() == 'master'){
                    
                    $oUser->setSpecialization($aUserData['specialization']);
                    $oUser->_setValidateScenario('specialization');
                    if($oUser->_Validate()){
                        $this->Category_SaveCategories($oUser, 'specialization');
                    } else {
                        foreach($oUser->_getValidateErrors() as $sError){
                            $this->Message_AddError($sError[0]);
                        }
                    }
                }
                if($oUser->getNumber()){
                    if($iFieldId = $this->User_userFieldExistsByName('phone')){
                        $this->User_setUserFieldsValues($oUser->getId(),array($iFieldId[0]['id'] => $oUser->getNumber()));
                    }
                }
                if($oUser->getMail()){
                    if($iFieldId = $this->User_userFieldExistsByName('mail')){
                        $this->User_setUserFieldsValues($oUser->getId(),array($iFieldId[0]['id'] => $oUser->getMail()));
                    }
                }
                
                
                return $oUser;
            }
        }else {
            /**
             * Получаем ошибки
             */
            foreach($oUser->_getValidateErrors() as $sError){
                $this->Message_AddError($sError[0]);
            }
            return false;
        }
    }
}