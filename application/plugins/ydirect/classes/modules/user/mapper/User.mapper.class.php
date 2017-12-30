<?php
/*
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
 * Маппер для работы с БД
 *
 * @package application.modules.user
 * @since 1.0
 */
class PluginFreelancer_ModuleUser_MapperUser extends PluginFreelancer_Inherit_ModuleUser_MapperUser
{
    public function GetUsersByFilter($aFilter, $aOrder, &$iCount, $iCurrPage, $iPerPage)
    {
        $aOrderAllow = array(
            'user_id',
            'user_login',
            'user_date_register',
            'user_rating',
            'user_profile_name'
        );
        $sOrder = '';
        foreach ($aOrder as $key => $value) {
            if (!in_array($key, $aOrderAllow)) {
                unset($aOrder[$key]);
            } elseif (in_array($value, array('asc', 'desc'))) {
                $sOrder .= " u.{$key} {$value},";
            }
        }
        $sOrder = trim($sOrder, ',');
        if ($sOrder == '') {
            $sOrder = ' u.user_id desc ';
        }
        
        
        if( isset($aFilter['#category']) and is_array($aFilter['#category']) ){
            $oUserEntity = Engine::GetEntity('ModuleUser_EntityUser');
            if( $oBeh = $oUserEntity->GetBehavior('category') ){
                $sJoinCategory = "JOIN " . Config::Get('db.table.category_target') . " category ON
                                u.user_id = category.target_id and
                                category.target_type = '".$oBeh->getParam('target_type')."' and
                                category.object_type = 'user' and
                                category.category_id IN ( ?a ) ";
            }
        }
        
        $sJoin = 
        $sql = "SELECT
					DISTINCT u.user_id
				FROM
					" . Config::Get('db.table.user') . " as u 
                                            ".$sJoinCategory."
                    { JOIN " . Config::Get('db.table.geo_target') . " as g ON ( u.user_id=g.target_id and g.country_id = ? ) }
                    { JOIN " . Config::Get('db.table.geo_target') . " as g ON ( u.user_id=g.target_id and g.region_id = ? ) }
                    { JOIN " . Config::Get('db.table.geo_target') . " as g ON ( u.user_id=g.target_id and g.city_id = ? ) }
					LEFT JOIN " . Config::Get('db.table.session') . " as s ON u.user_id=s.user_id
				WHERE
					1 = 1
					{ AND s.session_date_last >= ? }
					{ AND u.user_id = ?d }
					{ AND u.user_mail = ? }
					{ AND u.user_password = ? }
					{ AND u.user_ip_register = ? }
					{ AND u.user_activate = ?d }
					{ AND u.user_activate_key = ? }
					{ AND u.user_profile_sex = ? }
					{ AND u.user_login LIKE ? }
					{ AND u.user_profile_name LIKE ? }
					{ AND ( u.user_profile_name LIKE ? OR u.user_login LIKE ? ) }
				ORDER by {$sOrder}
				LIMIT ?d, ?d ;
					";
        $aResult = array();
        //echo $sql;
        //print_r($aFilter);
        if ($aRows = $this->oDb->selectPage($iCount, $sql,
            isset($aFilter['#category']) ? $aFilter['#category'] : DBSIMPLE_SKIP,
            isset($aFilter['geo_country']) ? $aFilter['geo_country'] : DBSIMPLE_SKIP,
            isset($aFilter['geo_region']) ? $aFilter['geo_region'] : DBSIMPLE_SKIP,
            isset($aFilter['geo_city']) ? $aFilter['geo_city'] : DBSIMPLE_SKIP,
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
            ($iCurrPage - 1) * $iPerPage, $iPerPage
        )
        ) {
            foreach ($aRows as $aRow) {
                $aResult[] = $aRow['user_id'];
            }
        }
        return $aResult;
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
            $oUser->getDateCommentLast(),
            $oUser->getRating(),
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

}