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
 * Сущность категории
 *
 * @package application.modules.category
 * @since 2.0
 */
class PluginYdirect_ModuleCategory_EntityCategory extends PluginYdirect_Inherit_ModuleCategory_EntityCategory
{

    
    
    protected $aRelations = array(
        'campaign' => array(EntityORM::RELATION_TYPE_HAS_ONE,'PluginYdirect_ModuleYdirect_EntityCampaign','category_id'),
        'type' => array(self::RELATION_TYPE_BELONGS_TO, 'ModuleCategory_EntityType', 'type_id'),
        self::RELATION_TYPE_TREE
    );
    
    
    public function getCampaignOrNew() {
        if( !$oCampaign = $this->getCampaign()){
            $oCampaign = Engine::GetEntity('PluginYdirect_Ydirect_Campaign');
        }
        return $oCampaign;
    }
    
    public function _getCategoryType() {
        $oType = $this->Category_GetTypeById($this->getTypeId());
        return $oType->getTargetType();
    }
}