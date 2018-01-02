<?php

class PluginFreelancer_ModuleUser extends PluginFreelancer_Inherit_ModuleUser
{
    protected $aBehaviors=array(
        'category'=> array(
                'class'=>'ModuleCategory_BehaviorModule',
                'target_type'=>'specialization',
        ),
        //'property'=>'ModuleProperty_BehaviorModule',
        'ygeo' =>array(
            'class'=>'PluginYdirect_ModuleGeo_BehaviorModule',
            'target_type'=>'user'
        )/*,
        
        'favourites' => 'PluginFreelancer_ModuleFavourites_BehaviorModule'*/
    );
    
    public function NumberIsExits($iNum) {
        return $this->oMapper->NumberIsExits($iNum);
    }
    
    public function IsNumber($sNum) {
        return preg_match('/^(8|\+7)[\- ]?\(?\d{3}\)?[\- ]?[\d\- ]{7,10}$/', $sNum);
    }
    
    public function GetUserByNumber($sValue) {
        $sNumer = str_replace(['(',')',' ','-',',','.','+'], '', trim($sValue));
        $aNum = $this->NumberIsExits($sNumer);
        return $this->GetUserById($aNum[0]['user_id']);
    }
    
    public function GetUsersByFilter($aFilter, $aOrder, $iCurrPage, $iPerPage, $aAllowData = null)
    {
       
        $sKey = "user_filter_" . serialize($aFilter) . serialize($aOrder) . "_{$iCurrPage}_{$iPerPage}";
        if (false === ($data = $this->Cache_Get($sKey))) {
            
            $this->RunBehaviorHook('module_orm_GetItemsByFilter_before',
                array('aFilter' => &$aFilter, 'sEntityFull' => 'User_User'), true);
            
            $iCount = 0;
            $data = array(
                'collection' => $this->oMapper->GetUsersByFilter($aFilter, $aOrder, $iCount, $iCurrPage, $iPerPage),
                'count'      => $iCount//$this->oMapper->GetCountUsersByFilter($aFilter)
            );
            /**
             * Если есть фильтр по "кто онлайн", то уменьшаем время кеширования до 10 минут
             */
            $iTimeCache = isset($aFilter['date_last_more']) ? 60 * 10 : 60 * 60 * 24 * 2;
            $this->Cache_Set($data, $sKey, array("user_update", "user_new"), $iTimeCache);
        }
        $data['collection'] = $this->GetUsersAdditionalData($data['collection'], $aAllowData);
        return $data;
    }
    
    /**
     * Получить юзера по айдишнику
     *
     * @param int $sId ID пользователя
     * @return ModuleUser_EntityUser|null
     */
    public function GetUserByUserId($sId)
    {
        if (!is_numeric($sId)) {
            return null;
        }
        $aUsers = $this->GetUsersAdditionalData($sId);
        if (isset($aUsers[$sId])) {
            return $aUsers[$sId];
        }
        return null;
    }
    
    public function AddUser($sRole) {
        $oUser = Engine::GetEntity('ModuleUser_EntityUser');
        $oUser->_setValidateScenario('freelancer_reg');
        /**
         * Заполняем поля (данные)
         */
        $oUser->setRole($sRole);
        $oUser->setLogin(getRequestStr('login'));
        $oUser->setEmailOrNumber(getRequestStr('email_or_number'));
        $oUser->setPassword(getRequestStr('pass'));
        $oUser->setPasswordConfirm(getRequestStr('pass'));
        $oUser->setProfileAbout($this->Session_Get('about'));
        //$oUser->setCaptcha(getRequestStr('g-recaptcha-response'));
        $oUser->setProfileName(getRequestStr('name'));
        $oUser->setDateRegister(date("Y-m-d H:i:s"));
        $oUser->setIpRegister(func_getIp());
        
        if (Config::Get('general.reg.activation')) {
            $oUser->setActivate(0);
            $oUser->setActivateKey(md5(func_generator() . time()));
        } else {
            $oUser->setActivate(1);
            $oUser->setActivateKey(null);
        }
        if ($oUser->_Validate()) {
            $oUser->setPassword($this->User_MakeHashPassword($oUser->getPassword()));
            
            if ($this->User_Add($oUser)) {
                $oRole = $this->Rbac_GetRoleByCode($sRole);
                $this->Rbac_AddRoleToUser($oRole, $oUser);
                $this->User_Update($oUser);
                
                $this->SetDefaultSettings($oUser);
                
                if ($sCode = $this->Session_Get('invite_code')) {
                    $this->Session_Drop('invite_code');
                    $this->Invite_UseCode($sCode, $oUser);
                }
                
                $this->Stream_switchUserEventDefaultTypes($oUser->getId());
                
                $oUser->setYGeo($this->Session_Get('ygeo'));
                $oUser->ygeo->CallbackAfterSave();
                
                if($oUser->getStrRole() == 'master'){
                    
                    $oUser->setSpecialization($this->Session_Get('specialization'));
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
    
    public function AddSocial($oUser) {
        if(!$oDataUser = $this->Session_Get('dataUser')){
            return false;
        }
        if(property_exists($oDataUser, 'photoURL')){
            $this->AddAvatar($oDataUser, $oUser);
        }
        $this->Session_Drop('master_reg');
        $oUser->setActivate(1);
        $this->User_Update($oUser);
        $oSocial = Engine::GetEntity('PluginSociality_Oauth_Social');
        $oSocial->setUserId($oUser->getId());
        $oSocial->setProfileUrl($oDataUser->profileURL);
        $oSocial->setSocialId($oDataUser->identifier);
        $oSocial->setSocialType($this->Session_Get('provider'));
        $oSocial->setDateReceived(date('Y-m-d H:i:s'));
        $this->PluginSociality_Oauth_AddSocial($oSocial);
        return true;
    }
    
    public function AddAvatar($oUserProfile, $oUser) {
        if($sPathPhoto = $this->PluginSociality_Oauth_GetPhotoByUrl($oUserProfile->photoURL)){

            if($this->User_CreateProfilePhoto($sPathPhoto, $oUser)){

                $this->User_CreateProfileAvatar($oUser->getProfileFoto(), $oUser);
            }

            $this->Fs_RemoveFileLocal($sPathPhoto);

        }
    }
    
    public function Authorization(ModuleUser_EntityUser $oUser, $bRemember = true, $sKey = null)
    {
        if (!$oUser->getId() or !$oUser->getActivate()) {
            return false;
        }
        
        //$this->Logger_Notice(strtotime($oUser->getDateLastAuth()). ' '. (time() - Config::Get('plugin.freelancer.rating.offset.online.timeoff')));
        if(strtotime($oUser->getDateLastAuth()) < (time() - Config::Get('plugin.freelancer.rating.offset.online.timeoff'))){
            $oUser->setRating($oUser->_getDataOne('user_rating') + 
                    Config::Get('plugin.freelancer.rating.offset.online.bid'));
        }
        $oUser->setDateLastAuth( date("Y-m-d H:i:s") );
        $this->User_Update($oUser);
        
        /**
         * Создаём новую сессию
         */
        if (!$this->CreateSession($oUser, $sKey)) {
            return false;
        }
        /**
         * Запоминаем в сесси юзера
         */
        $this->Session_Set('user_id', $oUser->getId());
        $this->Session_Set('session_key', $this->oSession->getKey());
        $this->oUserCurrent = $oUser;
        /**
         * Ставим куку
         */
        if ($bRemember) {
            $this->Session_SetCookie('key', $this->oSession->getKey(),
                time() + Config::Get('module.user.time_login_remember'), false,
                true);
        }
        return true;
    }
    
    public function CreateProfilePhoto($sFileFrom, $oUser, $aSize = null, $iCanvasWidth = null)
    {
        $aParams = $this->Image_BuildParams('profile_photo');
        /**
         * Если объект изображения не создан, возвращаем ошибку
         */
        if (!$oImage = $this->Image_OpenFrom($sFileFrom, $aParams)) {
            return $this->Image_GetLastError();
        }
        /**
         * Вырезаем область из исходного файла
         */
        if ($aSize) {
            $oImage->cropFromSelected($aSize, $iCanvasWidth);
        }
        if ($sError = $this->Image_GetLastError()) {
            return $sError;
        }
        /**
         * Сохраняем во временный файл для дальнейшего ресайза
         */
        if (false === ($sFileTmp = $oImage->saveTmp())) {
            return $this->Image_GetLastError();
        }
        $sPath = $this->Image_GetIdDir($oUser->getId(), 'users');
        /**
         * Имя файла для сохранения
         */
        $sFileName = func_generator(8);
        /**
         * Сохраняем копию нужного размера
         */
        $aSize = $this->Media_ParsedImageSize(Config::Get('module.user.profile_photo_size'));
        if ($aSize['crop']) {
            $oImage->cropProportion($aSize['w'] / $aSize['h'], 'center');
        }
        if (!$sFileResult = $oImage->resize($aSize['w'], $aSize['h'], true)->saveSmart($sPath, $sFileName)) {
            return $this->Image_GetLastError();
        }
        /**
         * Теперь можно удалить временный файл
         */
        $this->Fs_RemoveFileLocal($sFileTmp);
        /**
         * Если было старое фото, то удаляем
         */
        $this->DeleteProfilePhoto($oUser);
        $oUser->setProfileFoto($sFileResult);
        $oUser->_setValidateScenario('profile_foto');
        $oUser->_Validate();
        $this->User_Update($oUser);
        return true;
    }
    public function DeleteProfilePhoto($oUser)
    {
        if ($oUser->getProfileFoto()) {
            $this->Image_RemoveFile($oUser->getProfileFoto());
            $oUser->setProfileFoto(null);
            $oUser->_setValidateScenario('profile_foto');
            $oUser->_Validate();
        }
    }
    
    public function SetDefaultSettings($oUser) {
        $aDefault = [
            'notify_email_topic', 
            'notify_email_comment',
            'notify_email_talk', 
            'notify_email_reply_comment',
            'notify_email_new_friend',
            'notify_email_order', 
            'notify_email_order_start', 
            'notify_email_orders',
            'notify_email_response',
            'notify_email_bid',
            'notify_sms_talk', 
            'notify_sms_order', 
            'notify_sms_order_start',
            'notify_sms_orders',
            'notify_sms_response', 
            'notify_sms_bid', 
            'notify_panel_talk',
            'notify_panel_order', 
            'notify_panel_order_start',
            'notify_panel_orders', 
            'notify_panel_response', 
            'notify_panel_bid'];      
        foreach($aDefault as $sDefault){
            $oUser->setSettings($sDefault, 1);
        }
    }
}