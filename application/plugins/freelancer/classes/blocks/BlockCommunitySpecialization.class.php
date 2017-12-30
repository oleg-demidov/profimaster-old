<?php
/**
 * BlockNetworksapphelp.class.php
 * @author: Roman Revin <xgismox@gmail.com>
 * @date  : 02.07.13
 */

class PluginFreelancer_BlockCommunitySpecialization extends Block
{

    public function Exec()
    {
        $oCategoryType = Engine::GetEntity('Category_Type');
        $aBranchs = $this->Category_GetCategoryItemsByFilter([
            '#join' => ['JOIN '.MapperORM::GetTableName($oCategoryType).
                ' as ct on t.type_id = ct.id and ct.target_type = ?' => ['specialization']],
            '#where' => ['t.pid IS NULL' => []]
        ]);
        
        $oEmptySpecialization = Engine::GetEntity('Category_Category', ['id' => 'all', 'title' => 'Все']);
        array_unshift ( $aBranchs , $oEmptySpecialization );
        
        $iBranch = $this->Session_Get('community_branch');
        
        $this->Viewer_Assign('selectedBranch', $iBranch);
        $this->Viewer_Assign('aBranchs', $aBranchs);
        $this->SetTemplate('component@freelancer:community.block.specialization');
    }
}