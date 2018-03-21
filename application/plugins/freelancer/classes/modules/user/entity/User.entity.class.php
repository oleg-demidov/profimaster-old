<?php


class PluginFreelancer_ModuleUser_EntityUser extends PluginFreelancer_Inherit_ModuleUser_EntityUser
{
    /*
     * Если установить не подцепляется relation в ORM
     */

    protected $aBehaviors=array(
        // Настройка категорий
        'category'=>array(
            'class'=>'ModuleCategory_BehaviorEntity',
            'target_type'=>'specialization',
            'form_field'=>'specialization',
            'multiple'=>true,
            'validate_enable'=>false,
            'validate_min'=>1,
            'validate_max'=>500,
            'validate_only_without_children'=>false,
            'validate_from_request'=>false,
            'object_type' => 'user',
            'classes' => 'specialization'
        ),
        /*'ygeo' => [
            'class' => 'PluginYdirect_ModuleGeo_BehaviorEntity',
            'target_type' => 'user'
        ],*/
        'ymaps' => [
            'class'=>'PluginYmaps_ModuleGeo_BehaviorEntity',
            'target_type'=>'user',
            'validate_guest' => true
        ],
        'favourites' => 'PluginFreelancer_ModuleFavourites_BehaviorEntity'
    );
    
    public function Init() {
        $this->Hook_Run('freelancer_user_init', ['entity' => &$this]);
    }
    
    public function _getPrimaryKey()
    {
        return 'user_id';
    } 
    public function _getPrimaryKeyValue()
    {
        return $this->getId();
    }
    
    protected $aValidateRules = array(
        array('login', 'login', 'on' => array('registration', 'register_master_step3', 'register_employer_step1', 'login', '')), // '' - означает дефолтный сценарий
        array('login', 'login_exists', 'on' => array('registration', 'register_master_step3', 'register_employer_step1','login','login_exist')),
        array('email_or_number', 'email_or_number', 'allowEmpty' => false, 'on' => array( 'register_master_step3', 'register_employer_step1', 'email_or_number')),
        array('role', 'role', 'on' => array( 'register_master_step3', 'register_employer_step1', 'register_master_step2')),
        array('mail', 'email', 'allowEmpty' => false, 'on' => array('registration','')),
        array('mail', 'mail_exists', 'on' => array('registration')),
        array('specialization', 'specialization', 'on' => array('specialization', 'register_master_step2', 'register_master_step3')),
        array('profile_sex', 'profile_sex', 'on' => array('profile_sex', 'profile')),
        array('profile_birthday', 'profile_birthday', 'on' => array('profile_birthday', 'profile')),
        array('profile_foto', 'profile_foto', 'on' => array('profile_foto', 'profile')),        
        array('profile_about', 'profile_about', 'on' => array('register_master_step2', 'profile')),
        array('geo', 'geo', 'on' => array('register_master_step2', 'profile')),        
        array('profile_name', 'string', 'min' => 2, 'max'=>100 ,'allowEmpty' => false, 'on' => array( 'register_employer_step1', 'register_master_step3')),
        array('password', 'string', 'allowEmpty' => false, 'min' => 5, 'max'=>100 ,'on' => array( 'register_employer_step1', 'register_master_step3')),
        array('captcha', 'captcha_recaptcha', 'allowEmpty' => false, 'on' => array( 'register_employer_step1', 'register_master_step3'))
        
    );
    
    public function ValidateProfileFoto($sValue, $aParams) {
        if($this->getId()){
            $sOrigValue = null;
            $oUser = $this->User_GetUserById($this->getId());
            $sOrigValue = $oUser->getProfileFoto();
        }
        if($sOrigValue and !$sValue){
            $this->setRating($this->_getDataOne('user_rating') - 
                       Config::Get('plugin.freelancer.rating.offset.profile_avatar'));
            return true;
        }
        if(!$sOrigValue and $sValue){
            $this->setRating($this->_getDataOne('user_rating') + 
                       Config::Get('plugin.freelancer.rating.offset.profile_avatar'));
            return true;
        }
        return true;
    }
    
    public function ValidateProfileBirthday($sValue, $aParams) {
        if($this->getId()){
            $sOrigValue = null;
            $oUser = $this->User_GetUserById($this->getId());
            $sOrigValue = $oUser->getProfileBirthday();
        }
        if($sOrigValue and !$sValue){
            $this->setRating($this->_getDataOne('user_rating') - 
                       Config::Get('plugin.freelancer.rating.offset.profile_birthday'));
            return true;
        }
        if(!$sOrigValue and $sValue){
            $this->setRating($this->_getDataOne('user_rating') + 
                       Config::Get('plugin.freelancer.rating.offset.profile_birthday'));
            return true;
        }
        return true;
    }
    
    public function ValidateProfileSex($sValue, $aParams) {
        
        if(!$sValue){
            return true;
        }
        $aAllowSex = ['woman', 'man', 'other'];
        if(!in_array($sValue, $aAllowSex)){
            return "Поле Пол не действительно";
        }
        if($this->getId()){
            $oUser = $this->User_GetUserById($this->getId());
            if($oUser->getProfileSex()){
                if(!$sValue){
                    $this->setRating($this->_getDataOne('user_rating') - 
                        Config::Get('plugin.freelancer.rating.offset.profile_sex'));
                }
                return true;
            }
        }
        $this->setRating($this->_getDataOne('user_rating') + 
                Config::Get('plugin.freelancer.rating.offset.profile_sex'));
        return true;
    }
    
    public function ValidateProfileAbout($sValue, $aParams) { 
        $sOrigProfileAbout = '';
        
        if($oUser = $this->User_GetUserById($this->getId())){
            $sOrigProfileAbout = $oUser->getProfileAbout();
        }
        
        $iRatingOffset = $this->getRatingOffsetByAbout($sOrigProfileAbout, $sValue );
        $this->_setData(['rating_offset' => $iRatingOffset]); 
        $this->setRating($this->_getDataOne('user_rating') + $iRatingOffset);
        
        if(!$this->Validate_Validate('string',$sValue, 
                ['allowEmpty' => false, 'min'=>Config::Get('plugin.freelancer.user.validate.min_profile_about'), "max" => 5000])){
            return $this->Validate_GetErrors()[0];            
        }
        return true;
    }
    
    public function getRatingOffsetByAbout($sOrigProfileAbout, $sProfileAbout ) {
        $iStrLen = strlen($sProfileAbout) - strlen($sOrigProfileAbout);
        $aRatingOffsets = Config::Get('plugin.freelancer.rating.offset.profile_text');
        
        $iOffsetRes = 0;
        $iSign = ($iStrLen>0)?1:-1;
        
        foreach ($aRatingOffsets as $iStrLenNeed => $iOffset) {
            if (($iStrLen*$iSign) >= $iStrLenNeed) {
                $iOffsetRes = $iOffset;
            }
        }
        
        return $iOffsetRes * $iSign;
    }
    
    public function ValidateSpecialization($sValue, $aParams)
    {
        if(!is_array($sValue)){
            return $this->Lang_Get('plugin.freelancer.register.validation.no_specialization');
        }
        if(!$this->Rbac_IsAllowUser($this,'specialization', 'freelancer', ['count' => sizeof($sValue)])){
            return $this->Rbac_GetMsgLast();
        }
        return true;
    }
    
    public function ValidateEmailOrNumber($sValue, $aParams)
    {
        if (!$this->Validate_Validate('email', $sValue)) {
            $sNumer = str_replace(['(',')',' ','-',',','.','+'], '', trim($sValue));
            if(!$this->User_IsNumber($sValue)){
                return 'Поле "Email или Номер" не соответствует Email и Номеру';
            }elseif($this->User_NumberIsExits($sNumer)){
                return 'Такой номер занят';
            }else{
                $this->setNumber($sNumer);
            }
        }elseif($this->User_GetUserByMail($sValue)){
            return 'Такой Email занят';
        }else{
            $this->setMail($sValue);        
        }
        return true;
    }
    
    public function ValidateGeo($sValue, $aParams)
    {
        $oGeo=null; 
        if(isset($sValue['city']) ){
            $oGeo = $this->Geo_GetGeoObject('city', $sValue['city']);
        }elseif(isset($sValue['region']) ){
            $oGeo = $this->Geo_GetGeoObject('region', $sValue['region']);
        }elseif(isset($sValue['country'])){
            $oGeo = $this->Geo_GetGeoObject('country', $sValue['country']);
        }
        
        if($oGeo){
            $oGeoTarget = Engine::GetEntity('Geo_Target', $oGeo->_getData(['city_id', 'country_id', 'region_id']));
            $oGeoTarget->_setData([$oGeo->getType().'_id' => $oGeo->getId()]);
            $oGeoTarget->setTargetType('user');   
            $oGeoTarget->setGeoType($oGeo->getType());
            
            $this->setGeoTarget($oGeoTarget);
        }else{
            return $this->Lang_Get('plugin.freelancer.user.validators.no_geo');
        }
        return true;
    }    
    
    public function ValidateRole($sValue, $aParams)
    {
        $aRoleAllow = ['master','employer','manager'];
        if(!in_array( $sValue, $aRoleAllow)){
            return "Выберете вашу роль";
        }
        return true;
    }
    
    public function setDateLastAuth($sValue) {
        $this->_setData(['date_last_auth' => $sValue]);
    }
    
    public function getDisplayName2()
    {
        return $this->getProfileName()?$this->getProfileName():$this->getLogin();
    }
    
    public function getProfileName() {
        return parent::getProfileName()?parent::getProfileName():$this->getDisplayName();
    }
    
    public function getDateLastAuth() {
        return $this->_getDataOne('date_last_auth');
    }
    
    public function getNumber() {
        if($sNumber = $this->_getDataOne('number')){
            return $sNumber;
        }
        $aValues = $this->User_getUserFieldValueByName($this->getId(), 'phone');
        return $aValues;
    }
     public function getNumberCrop() {
        return ($this->getNumber())?substr($this->getNumber(),0, 5).'.....':null;
    }  
    
    public function getCountResponse() {
        return (int)$this->PluginFreelancer_Freelancer_GetCountItemsByFilter(['user_id' => $this->getId()],
                'PluginFreelancer_ModuleFreelancer_EntityResponse');
    }
    
    public function getCountResponsed() {
        return (int)$this->PluginFreelancer_Freelancer_GetCountResponseByTargetId($this->getId());
    }
    
    public function getRating() 
    {
        $iMult = 1;
        if($this->isRating20()){
            $iMult = 1.2;
        }
        if($this->isRating40()){
            $iMult = 1.4;
        }
        return number_format(round(($this->_getDataOne('user_rating')*$iMult), 2), 2, '.', '');
    }
    
    public function getUserWebPath() {
        return Router::GetPath('user/'.$this->getLogin());
    }
    
    public function getIsFavourite()
    {
        if ($this->getFavourite()) {
            return true;
        }
        return false;
    }
    
    public function getCountOrders() {
        if($this->getStrRole() == 'master'){
            $aBids = $this->PluginFreelancer_Order_GetBidItemsByFilter(['user_id' => $this->getId(),'#index-from' => 'id']);
            $aFilter['#where'] = ['master_id = ? or t.id IN (?a)' => [$this->getId(),array_merge([0],array_keys($aBids))]];
             $aFilter['status in'] = ['start', 'master_wait','end'];
            return (int)$this->PluginFreelancer_Order_GetCountItemsByFilter($aFilter,'PluginFreelancer_ModuleOrder_EntityOrder');
        }
        return (int)$this->PluginFreelancer_Order_GetCountOrdersByUserId($this->getId());
    }
    /*
     * Портфолио
     */
    public function getCountWorks() {
        return (int)$this->PluginFreelancer_Portfolio_GetCountWorksByUserId($this->getId());
    }
    
    public function getWorks($iLimit = 1) {
        return $this->PluginFreelancer_Portfolio_GetWorkItemsByFilter(['user_id' => $this->getId(), '#limit' => $iLimit]);
    }
    
    public function getCountOrdersDone() {
        if($this->getStrRole() == 'employer'){
            return (int)$this->PluginFreelancer_Order_GetCountOrdersByUserId($this->getId());
        }else{
            return (int)$this->PluginFreelancer_Order_GetCountDoneOrdersByMasterId($this->getId());
        } 
    }
    /*
     * Права
     */
    public function getStrRole() {
        if($sRole = $this->getRoleString()){
            return $sRole;
        }
        if($this->isEmployer()){
            $this->setRoleString( 'employer');
        }elseif($this->isMaster()){
            $this->setRoleString('master');
        }else{
            $this->setRoleString('manager');
        }
        return $this->getRoleString();
    }
    


    public function getPro() {
        if($this->Rbac_IsAllowUser($this,'profi','freelancer')){
            return 'Profi';
        }
        if($this->Rbac_IsAllowUser($this,'pro','freelancer')){
            return 'Pro';
        }
        return null;
    }
    
    public function getSettings($sType) {
        if($oSettings = $this->PluginFreelancer_Settings_GetSettingsByFilter(['type' => $sType, 'user_id' => $this->getId()])){
            return $oSettings->getValue();
        }
        return false;
    }
    
    public function getPaySumm($aFilter = []) {
        $iSumm = 0;
        if( $aPayments = $this->PluginRobokassa_Payment_GetPaymentItemsByFilter(array_merge([
            '#select' => 'id, summ',
            '#where' => ['t.state > ?d' => [0]], 
            'user_id' => $this->getId()], $aFilter)) ){
            foreach($aPayments as $oPayment){
                $iSumm = $iSumm + $oPayment->getSumm();
            }
            return $iSumm;
        }
        return 0;
    }
    
    public function getManagerProfit($iSumm) {
        return round($iSumm/100*Config::Get('plugin.freelancer.manager.precent'));
    }
    
    public function setSettings($sType, $bValue) {
        if(!$oSettings = $this->PluginFreelancer_Settings_GetSettingsByFilter(['type' => $sType, 'user_id' => $this->getId()])){
            $oSettings = Engine::GetEntity('PluginFreelancer_Settings_Settings');
            $oSettings->setType($sType);
            $oSettings->setUserId($this->getId());
        }
        $oSettings->setValue($bValue);
        return $oSettings->Save();
    }
    
    public function __call($sName, $aArgs)
    {
        if(substr($sName, 0, 6) == 'isRole') {
            if($this->isAdministrator()){
                return true;
            }
            $sRole = func_underscore(substr($sName,6));
            $aRoles = $this->Rbac_GetRolesByUser($this, true, ['#index-from' => 'code', '#select' => 'code']);
            return in_array($sRole, array_keys($aRoles));
            
        }elseif (substr($sName, 0, 2) == 'is') {
            if($this->isAdministrator()){
                return true;
            }
            $sPermission = func_underscore(substr($sName,2));
            $aParams = isset($aArgs[0])?$aArgs[0]:[];
            return $this->Rbac_IsAllowUser($this, $sPermission,'freelancer', $aParams);
        } else{
            return parent::__call($sName, $aArgs);
        }
    }
}