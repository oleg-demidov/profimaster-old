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
class PluginFreelancer_HookCommunity extends Hook
{
    /**
     * Регистрация необходимых хуков
     */
    public function RegisterHook()
    {
        /**
         * Хук на отображение админки
         */
        $this->AddHook('get_topics_by_custom_filter', 'FilterTopics', null, 100000);
    }

    /**
     * Добавляем в главное меню админки свой раздел с подпунктами
     */
    public function FilterTopics($aParams)
    {
        if(!$iBranchId = $this->Session_Get('community_branch')){
            return;
        }
        if($iBranchId == 'all'){
            $this->Session_Set('community_categories', null);
            return;
        }
        
        if(!$oCategory = $this->Category_GetCategoryByFilter(['id' => $iBranchId])){
            return;
        }
        
        if(!is_array($aCategoryIds = $this->Session_Get('community_categories'))){
            $aCategoryIds = $this->Category_GetChildsIds($oCategory);
            $this->Session_Set('community_categories', $aCategoryIds );
        }
              
        $aTargetItems = $this->Category_GetTargetItemsByFilter(array(
            'category_id in' => $aCategoryIds,
            'target_type'    => 'specialization',
            'object_type' => 'blog',
            '#index-from' => 'target_id',
            '#select'=> ['target_id']
        ));
        $aBlogsIds = array_merge(array_keys($aTargetItems), [0]); 
        $this->Session_Set('community_branch_blogs', $aBlogsIds );
                
        $aParams['aFilter']['blog_id'] = $aBlogsIds;
    }

}