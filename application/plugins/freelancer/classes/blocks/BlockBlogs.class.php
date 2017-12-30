<?php

class PluginFreelancer_BlockBlogs extends Block
{
    /**
     * Запуск обработки
     */
    public function Exec()
    {
                
        $aBlogsIds = $this->Session_Get('community_branch_blogs'); 
        
        $aResult = $this->Blog_GetBlogsByFilter(array('exclude_type' => 'personal', 'id'=>$aBlogsIds), array('blog_count_user' => 'desc'),
            1, Config::Get('block.blogs.row'));
        
        if ($aResult) {
            $aBlogs = $aResult['collection'];
            $oViewer = $this->Viewer_GetLocalViewer();
            $oViewer->Assign('aBlogs', $aBlogs);
            
            
            $sTextResult = $oViewer->Fetch("component@blog.top");
            $this->Viewer_Assign('sBlogsTop', $sTextResult);
        }

        $this->SetTemplate('component@blog.block.blogs');
    }
}