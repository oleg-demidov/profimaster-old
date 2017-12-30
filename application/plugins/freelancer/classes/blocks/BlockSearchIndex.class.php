<?php
/**
 * BlockNetworksapphelp.class.php
 * @author: Roman Revin <xgismox@gmail.com>
 * @date  : 02.07.13
 */

class PluginFreelancer_BlockSearchIndex extends Block
{
    public function Exec()
    {
        $this->Viewer_Assign('action', Router::GetPath('user/search'),true);
        $this->SetTemplate('component@freelancer:specialization-tabs.form');     
    }
}