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
class PluginFreelancer_ModuleFavourites_MapperFavourites extends MapperORM
{
    public function GetCountFavouritesForTarget($iUserId, $iTargetId, $sTargetType)
    {
        $sql = "SELECT count(*)
				FROM " . Config::Get('db.table.favourite') . "
				WHERE 			
					user_id = ?d
					AND		
					target_id = ?d	
					AND
					target_type = ? ";
        return $this->oDb->selectCell($sql, $iUserId, $iTargetId, $sTargetType);
    }
}