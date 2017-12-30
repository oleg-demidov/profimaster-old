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
 * Часть экшена админки по управлению ajax запросами
 */
class PluginFreelancer_ActionAdmin_EventKbd extends Event
{

    public function Init()
    {
       
    }

    /**
     * Обработка добавления страницы
     */
    public function EventList()
    {
        $aPosts = $this->PluginFreelancer_Kdb_GetPostItemsByFilter(['#select' => ['ID','post_title'], 'post_status' => 'publish']);
        $this->Viewer_Assign('aPosts',$aPosts);
        $this->SetTemplateAction('kbd-list');
    }
    
     public function EventPost()
    {
        $iPostId = $this->GetParam(1);
        $oPost = $this->PluginFreelancer_Kdb_GetPostByFilter(['ID' => $iPostId]);
        $this->Viewer_Assign('oPost',$oPost);
        $this->SetTemplateAction('kbd-post');
    }
}