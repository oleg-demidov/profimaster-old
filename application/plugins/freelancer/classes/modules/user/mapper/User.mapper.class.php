<?php

class PluginFreelancer_ModuleUser_MapperUser extends PluginFreelancer_Inherit_ModuleUser_MapperUser
{
       
    public function GetUsersByFilter($aFilter, $aOrder, &$iCount, $iCurrPage, $iPerPage)
    {
        
        $aOrderAllow = array(
            'user_id',
            'user_login',
            'user_date_register',
            'user_rating',
            'user_profile_name',
        );
        $sOrder = '';
        foreach ($aOrder as $key => $value) {
            if (!in_array($key, $aOrderAllow)) {
                unset($aOrder[$key]);
            } elseif (in_array($value, array('asc', 'desc'))) {
                $sOrder .= " t.{$key} {$value},";
            }
            if($key == 'field' and sizeof($value)){
                $sOrder .= ' FIELD(t.user_id,'.join(',',$value).') desc,';
            }
        }
        $sOrder = trim($sOrder, ',');
        if ($sOrder == '') {
            $sOrder = ' t.user_id desc ';
        }
                
        list($sJoinTables, $aFilterFields ) = $this->getJoins($aFilter);
        if(!$sJoinTables) $sJoinTables = '';

        $sql = "SELECT
					DISTINCT t.user_id 
				FROM
					" . Config::Get('db.table.user') . " as t 
                                            ".$sJoinTables."
                    { JOIN " . Config::Get('db.table.geo_target') . " as g ON ( t.user_id=g.target_id and g.country_id = ? ) }
                    { JOIN " . Config::Get('db.table.geo_target') . " as g ON ( t.user_id=g.target_id and g.region_id = ? ) }
                    { JOIN " . Config::Get('db.table.geo_target') . " as g ON ( t.user_id=g.target_id and g.city_id = ? ) }
					LEFT JOIN " . Config::Get('db.table.session') . " as s ON t.user_id=s.user_id
				WHERE
					1 = 1
                                        { AND t.user_id IN (?a)}
                                        { AND t.user_id NOT IN (?a)}
					{ AND s.session_date_last >= ? }
					{ AND t.user_id = ?d }
					{ AND t.user_mail = ? }
					{ AND t.user_password = ? }
					{ AND t.user_ip_register = ? }
					{ AND t.user_activate = ?d }
					{ AND t.user_activate_key = ? }
					{ AND t.user_profile_sex = ? }
					{ AND t.user_login LIKE ? }
					{ AND t.user_profile_name LIKE ? }
					{ AND ( t.user_profile_name LIKE ? OR t.user_login LIKE ? OR t.user_profile_about LIKE ? ) }
				ORDER by {$sOrder}
				LIMIT ?d, ?d ;
					";
        $aResult = array();
        //echo $sOrder;
        //print_r($aFilter);
        $aQueryParams = [&$iCount, $sql];
        if($aFilterFields){
            $aQueryParams = array_merge($aQueryParams, array_values($aFilterFields));
        }
        //print_r($aQueryParams);
        $aQueryParams = array_merge($aQueryParams, [
            isset($aFilter['geo_country']) ? $aFilter['geo_country'] : DBSIMPLE_SKIP,
            isset($aFilter['geo_region']) ? $aFilter['geo_region'] : DBSIMPLE_SKIP,
            isset($aFilter['geo_city']) ? $aFilter['geo_city'] : DBSIMPLE_SKIP,
            isset($aFilter['id_in']) ? $aFilter['id_in'] : DBSIMPLE_SKIP,
            isset($aFilter['not_in']) ? $aFilter['not_in'] : DBSIMPLE_SKIP,
            isset($aFilter['date_last_more']) ? $aFilter['date_last_more'] : DBSIMPLE_SKIP,
            isset($aFilter['id']) ? $aFilter['id'] : DBSIMPLE_SKIP,
            isset($aFilter['mail']) ? $aFilter['mail'] : DBSIMPLE_SKIP,
            isset($aFilter['password']) ? $aFilter['password'] : DBSIMPLE_SKIP,
            isset($aFilter['ip_register']) ? $aFilter['ip_register'] : DBSIMPLE_SKIP,
            isset($aFilter['activate']) ? $aFilter['activate'] : DBSIMPLE_SKIP,
            isset($aFilter['activate_key']) ? $aFilter['activate_key'] : DBSIMPLE_SKIP,
            isset($aFilter['profile_sex']) ? $aFilter['profile_sex'] : DBSIMPLE_SKIP,
            isset($aFilter['login']) ? $aFilter['login'] : DBSIMPLE_SKIP,
            isset($aFilter['profile_name']) ? $aFilter['profile_name'] : DBSIMPLE_SKIP,
            isset($aFilter['name']) ? $aFilter['name'] : DBSIMPLE_SKIP,
            isset($aFilter['name']) ? $aFilter['name'] : DBSIMPLE_SKIP,
            isset($aFilter['name']) ? $aFilter['name'] : DBSIMPLE_SKIP,
            ($iCurrPage - 1) * $iPerPage, $iPerPage
        ]); 
        
        
        if ($aRows = call_user_func_array(array($this->oDb, 'selectPage'), $aQueryParams)) 
        {
            foreach ($aRows as $aRow) {
                $aResult[] = $aRow['user_id'];
            }
        }
        return $aResult;
    }
    
    
    public function GetUsersByArrayId($aArrayId, $aFilter = null)
    {
        if (!is_array($aArrayId) or count($aArrayId) == 0) {
            return array();
        }

        $sSelect = 'u.*';
        if (isset($aFilter['#select'])) {
            foreach($aFilter['#select'] as &$val){
                $val = 'u.'.$val;
            }
            if (!is_array($aFilter['#select'])) {
                $aFilter['#select'] = array($aFilter['#select']);
            }
            $sSelect = join(', ', $aFilter['#select']);
        }

        $sql = "SELECT
					{$sSelect}
				FROM
					" . Config::Get('db.table.user') . " as u
				WHERE
					u.user_id IN(?a)
				ORDER BY FIELD(u.user_id,?a) ";
        $aUsers = array(); 
        if ($aRows = $this->oDb->select($sql, $aArrayId, $aArrayId)) {
            foreach ($aRows as $aUser) {
                $aUsers[] = Engine::GetEntity('User', $aUser);
            }
        }
        return $aUsers;
    }
    
    public function getJoins($aFilter) {
        $sJoinTables = '';
        if (isset($aFilter['#join']) and is_array($aFilter['#join'])) {
            $aValuesForMerge = array();
            foreach ($aFilter['#join'] as $sJoin => $aValues) {
                if (is_int($sJoin)) {
                    $sJoinTables .= ' ' . $aValues . ' ';
                } else {
                    $sJoinTables .= ' ' . $sJoin . ' ';
                    $aValuesForMerge = array_merge($aValuesForMerge, $aValues);
                }
            }
            //$aFilterFields = array_merge($aValuesForMerge, $aFilterFields);
        }
        return array($sJoinTables, $aValuesForMerge );
    }
    
    public function NumberIsExits($iNum) {
        
        $sql = "SELECT * FROM ".Config::Get('db.table.user_field_value')." WHERE `value` = ?d";
        return $this->oDb->query( $sql, $iNum);
    }

    public function Update(ModuleUser_EntityUser $oUser)
    {
        $sql = "UPDATE " . Config::Get('db.table.user') . "
			SET
				user_password = ? ,
				user_mail = ? ,
                                user_login = ? ,
				user_admin = ? ,
				user_date_activate = ? ,
                                date_last_auth = ? ,
				user_date_comment_last = ? ,
				user_rating = ? ,
				user_count_vote = ? ,
				user_activate = ? ,
                user_activate_key = ? ,
                user_referral_code = ? ,
				user_profile_name = ? ,
				user_profile_sex = ? ,
				user_profile_country = ? ,
				user_profile_region = ? ,
				user_profile_city = ? ,
				user_profile_birthday = ? ,
				user_profile_about = ? ,
				user_profile_date = ? ,
				user_profile_avatar = ?	,
				user_profile_foto = ? ,
				user_settings_notice_new_topic = ?	,
				user_settings_notice_new_comment = ? ,
				user_settings_notice_new_talk = ?	,
				user_settings_notice_reply_comment = ? ,
				user_settings_notice_new_friend = ? ,
				user_settings_timezone = ?
			WHERE user_id = ?
		";
        $res = $this->oDb->query($sql, $oUser->getPassword(),
            $oUser->getMail(),
            $oUser->getLogin(),
            $oUser->getAdmin(),
            $oUser->getDateActivate(),
            $oUser->getDateLastAuth(),
            $oUser->getDateCommentLast(),
            $oUser->_getDataOne('user_rating'),
            $oUser->getCountVote(),
            $oUser->getActivate(),
            $oUser->getActivateKey(),
            $oUser->getReferralCode(),
            $oUser->getProfileName(),
            $oUser->getProfileSex(),
            $oUser->getProfileCountry(),
            $oUser->getProfileRegion(),
            $oUser->getProfileCity(),
            $oUser->getProfileBirthday(),
            $oUser->getProfileAbout(),
            $oUser->getProfileDate(),
            $oUser->getProfileAvatar(),
            $oUser->getProfileFoto(),
            $oUser->getSettingsNoticeNewTopic(),
            $oUser->getSettingsNoticeNewComment(),
            $oUser->getSettingsNoticeNewTalk(),
            $oUser->getSettingsNoticeReplyComment(),
            $oUser->getSettingsNoticeNewFriend(),
            $oUser->getSettingsTimezone(),
            $oUser->getId());
        return $this->IsSuccessful($res);
    }
    
    public function getUserFieldValueByName($iUserId, $sName)
    {
        $sql = 'SELECT value FROM ' . Config::Get('db.table.user_field_value') . '  WHERE
                        user_id = ?d
                        AND
                        field_id = (SELECT id FROM ' . Config::Get('db.table.user_field') . ' WHERE name =?)';
        $ret = $this->oDb->selectCol($sql, $iUserId, $sName);
        if(!isset($ret[0])){
            return null;
        }
        return $ret[0];
    }
}