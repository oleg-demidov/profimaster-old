<?php

class PluginFreelancer_ModuleFreelancer_MapperComment extends PluginFreelancer_Inherit_ModuleComment_MapperComment
{

    
    public function GetCommentsOnline($sTargetType, $aExcludeTargets, $iLimit)
    {
        
        $aBlogsIds = $this->Session_Get('community_branch_blogs'); 
        $sql = "SELECT
					comment_id	
				FROM 
					" . Config::Get('db.table.comment_online') . "
				WHERE 												
					target_type = ?
				{ AND target_parent_id NOT IN(?a) }
                                { AND target_parent_id IN(?a) }
				ORDER by comment_online_id desc limit 0, ?d ; ";

        $aComments = array();
        if ($aRows = $this->oDb->select(
            $sql, $sTargetType,
            (count($aExcludeTargets) ? $aExcludeTargets : DBSIMPLE_SKIP),
            (count($aBlogsIds) ? $aBlogsIds : DBSIMPLE_SKIP),
            $iLimit
        )
        ) {
            foreach ($aRows as $aRow) {
                $aComments[] = $aRow['comment_id'];
            }
        }
        return $aComments;
    }
}