<?php

class PluginFreelancer_ModuleFreelancer_MapperTopic extends PluginFreelancer_Inherit_ModuleTopic_MapperTopic
{

    public function GetOpenTopicTags($iLimit, $iUserId = null)
    {
        $aBlogsIds = $this->Session_Get('community_branch_blogs');
        $sql = "
			SELECT 
				tt.topic_tag_text,
				count(tt.topic_tag_text)	as count		 
			FROM 
				" . Config::Get('db.table.topic_tag') . " as tt,
				" . Config::Get('db.table.blog') . " as b
			WHERE
				1 = 1
				{ AND tt.user_id = ?d }
				AND
				tt.blog_id = b.blog_id
                                { AND tt.blog_id IN(?a) }
				AND
				b.blog_type <> 'close'
			GROUP BY 
				tt.topic_tag_text
			ORDER BY 
				count desc		
			LIMIT 0, ?d
				";
        $aReturn = array();
        $aReturnSort = array();
        if ($aRows = $this->oDb->select($sql, 
                is_null($iUserId) ? DBSIMPLE_SKIP : $iUserId,
                (count($aBlogsIds) ? $aBlogsIds : DBSIMPLE_SKIP), $iLimit)) {
            foreach ($aRows as $aRow) {
                $aReturn[mb_strtolower($aRow['topic_tag_text'], 'UTF-8')] = $aRow;
            }
            ksort($aReturn);
            foreach ($aReturn as $aRow) {
                $aReturnSort[] = Engine::GetEntity('Topic_TopicTag', $aRow);
            }
        }
        return $aReturnSort;
    }
}