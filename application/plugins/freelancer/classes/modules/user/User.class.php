<?php

class PluginFreelancer_ModuleUser extends PluginFreelancer_Inherit_ModuleUser
{
    protected $aBehaviors=array(
        'category'=> array(
                'class'=>'ModuleCategory_BehaviorModule',
                'target_type'=>'specialization',
        ),
        //'property'=>'ModuleProperty_BehaviorModule',
        /*'ygeo' =>array(
            'class'=>'PluginYdirect_ModuleGeo_BehaviorModule',
            'target_type'=>'user'
        ),
        
        'favourites' => 'PluginFreelancer_ModuleFavourites_BehaviorModule'*/
    );
    
    public function NumberIsExits($iNum) {
        return $this->oMapper->NumberIsExits($iNum);
    }
    
    public function IsNumber($sNum) {
        return preg_match('/^(8|\+7)[\- ]?\(?\d{3}\)?[\- ]?[\d\- ]{7,10}$/', $sNum);
    }
    
    public function GetFieldsByName($iUserId, $sName) {
        $aFields = $this->getUserFieldsValues($iUserId, true, ['contact', 'social']);
        foreach($aFields as &$oField ){
            if($oField->getName() != $sName){
                unset($oField);
            }
        }
        return $aFields;
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
        if(isset($aFilter['#select']) and count($aFilter['#select'])){
            $data['collection'] = $this->GetUsersAdditionalData($data['collection'], $aAllowData, ['#select' => $aFilter['#select']] );
        }else{
            $data['collection'] = $this->GetUsersAdditionalData($data['collection'], $aAllowData);
        }
        return $data;
    }
    
    /**
     * Получает дополнительные данные(объекты) для юзеров по их ID
     *
     * @param array $aUserId Список ID пользователей
     * @param array|null $aAllowData Список типод дополнительных данных для подгрузки у пользователей
     * @return array
     */
    public function GetUsersAdditionalData($aUserId, $aAllowData = null, $aFilter = null)
    {
        if (is_null($aAllowData)) {
            $aAllowData = array('vote', 'session', 'friend', 'geo_target', 'note');
        }
        func_array_simpleflip($aAllowData);
        if (!is_array($aUserId)) {
            $aUserId = array($aUserId);
        }
        /**
         * Получаем юзеров
         */
        $aUsers = $this->GetUsersByArrayId($aUserId, $aFilter);
        /**
         * Получаем дополнительные данные
         */
        $aSessions = array();
        $aFriends = array();
        $aVote = array();
        $aGeoTargets = array();
        $aNotes = array();
        if (isset($aAllowData['session'])) {
            $aSessions = $this->GetSessionsByArrayId($aUserId);
        }
        if (isset($aAllowData['friend']) and $this->oUserCurrent) {
            $aFriends = $this->GetFriendsByArray($aUserId, $this->oUserCurrent->getId());
        }

        if (isset($aAllowData['vote']) and $this->oUserCurrent) {
            $aVote = $this->Vote_GetVoteByArray($aUserId, 'user', $this->oUserCurrent->getId());
        }
        if (isset($aAllowData['geo_target'])) {
            $aGeoTargets = $this->Geo_GetTargetsByTargetArray('user', $aUserId);
        }
        if (isset($aAllowData['note']) and $this->oUserCurrent) {
            $aNotes = $this->GetUserNotesByArray($aUserId, $this->oUserCurrent->getId());
        }
        /**
         * Добавляем данные к результату
         */
        foreach ($aUsers as $oUser) {
            if (isset($aSessions[$oUser->getId()])) {
                $oUser->setSession($aSessions[$oUser->getId()]);
            } else {
                $oUser->setSession(null); // или $oUser->setSession(new ModuleUser_EntitySession());
            }
            if ($aFriends && isset($aFriends[$oUser->getId()])) {
                $oUser->setUserFriend($aFriends[$oUser->getId()]);
            } else {
                $oUser->setUserFriend(null);
            }

            if (isset($aVote[$oUser->getId()])) {
                $oUser->setVote($aVote[$oUser->getId()]);
            } else {
                $oUser->setVote(null);
            }
            if (isset($aGeoTargets[$oUser->getId()])) {
                $aTargets = $aGeoTargets[$oUser->getId()];
                $oUser->setGeoTarget(isset($aTargets[0]) ? $aTargets[0] : null);
            } else {
                $oUser->setGeoTarget(null);
            }
            if (isset($aAllowData['note'])) {
                if (isset($aNotes[$oUser->getId()])) {
                    $oUser->setUserNote($aNotes[$oUser->getId()]);
                } else {
                    $oUser->setUserNote(false);
                }
            }
        }

        return $aUsers;
    }

    /**
     * Список юзеров по ID
     *
     * @param array $aUserId Список ID пользователей
     * @return array
     */
    public function GetUsersByArrayId($aUserId, $aFilter = null)
    {
        if (!$aUserId) {
            return array();
        }
        if (Config::Get('sys.cache.solid')) {
            return $this->GetUsersByArrayIdSolid($aUserId, $aFilter);
        }
        if (!is_array($aUserId)) {
            $aUserId = array($aUserId);
        }
        $aUserId = array_unique($aUserId);
        $aUsers = array();
        $aUserIdNotNeedQuery = array();
        
        if($aFilter === null){
            $aKeyPrefix = 'user_';
        }else{
            $aKeyPrefix = 'user_'. serialize($aFilter);
        }
        /**
         * Делаем мульти-запрос к кешу
         */
        $aCacheKeys = func_build_cache_keys($aUserId, $aKeyPrefix);
        if (false !== ($data = $this->Cache_Get($aCacheKeys))) {
            /**
             * проверяем что досталось из кеша
             */
            foreach ($aCacheKeys as $sValue => $sKey) {
                if (array_key_exists($sKey, $data)) {
                    if ($data[$sKey]) {
                        $aUsers[$data[$sKey]->getId()] = $data[$sKey];
                    } else {
                        $aUserIdNotNeedQuery[] = $sValue;
                    }
                }
            }
        }
        /**
         * Смотрим каких юзеров не было в кеше и делаем запрос в БД
         */
        $aUserIdNeedQuery = array_diff($aUserId, array_keys($aUsers));
        $aUserIdNeedQuery = array_diff($aUserIdNeedQuery, $aUserIdNotNeedQuery);
        $aUserIdNeedStore = $aUserIdNeedQuery;
        if ($data = $this->oMapper->GetUsersByArrayId($aUserIdNeedQuery, $aFilter)) {
            foreach ($data as $oUser) {
                /**
                 * Добавляем к результату и сохраняем в кеш
                 */
                $aUsers[$oUser->getId()] = $oUser;
                $this->Cache_Set($oUser, "{$aKeyPrefix}{$oUser->getId()}", array(), 60 * 60 * 24 * 4);
                $aUserIdNeedStore = array_diff($aUserIdNeedStore, array($oUser->getId()));
            }
        }
        /**
         * Сохраняем в кеш запросы не вернувшие результата
         */
        foreach ($aUserIdNeedStore as $sId) {
            $this->Cache_Set(null, "{$aKeyPrefix}{$sId}", array(), 60 * 60 * 24 * 4);
        }
        /**
         * Сортируем результат согласно входящему массиву
         */
        $aUsers = func_array_sort_by_keys($aUsers, $aUserId);
        return $aUsers;
    }
    
    /**
     * Получение пользователей по списку ID используя общий кеш
     *
     * @param array $aUserId Список ID пользователей
     * @return array
     */
    public function GetUsersByArrayIdSolid($aUserId, $aFilter = null)
    {
      
        if (!is_array($aUserId)) {
            $aUserId = array($aUserId);
        }
        $aUserId = array_unique($aUserId);
        $aUsers = array();
        if($aFilter === null){
            $aKeyPrefix = 'user_id_';
        }else{
            $aKeyPrefix = 'user_id_'. serialize($aFilter);
        }
        $s = join(',', $aUserId);
        if (false === ($data = $this->Cache_Get("{$aKeyPrefix}{$s}"))) {
            $data = $this->oMapper->GetUsersByArrayId($aUserId, $aFilter);
            foreach ($data as $oUser) {
                $aUsers[$oUser->getId()] = $oUser;
            }
            $this->Cache_Set($aUsers, "{$aKeyPrefix}{$s}", array("user_update", "user_new"), 60 * 60 * 24 * 1);
            return $aUsers;
        }
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