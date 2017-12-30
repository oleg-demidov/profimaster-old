<?php


/**
 * Description of ActionOrder
 *
 * @author oleg
 */
class PluginFreelancer_ActionIndex extends PluginFreelancer_Inherit_ActionIndex{
    
    public function Init()
    {
        /**
         * Подсчитываем новые топики
         */
        $this->iCountTopicsCollectiveNew = $this->Topic_GetCountTopicsCollectiveNew();
        $this->iCountTopicsPersonalNew = $this->Topic_GetCountTopicsPersonalNew();
        $this->iCountTopicsNew = $this->iCountTopicsCollectiveNew + $this->iCountTopicsPersonalNew;
        $this->sNavTopicsSubUrl = Router::GetPath('community');
        
        $this->Component_Add('freelancer:Community');
        if($iBranch = getRequest('branch')){
            $this->Session_Set('community_branch', $iBranch);
            $this->Session_Set('community_categories', null);
            $this->Session_Set('community_branch_blogs', null );
        }
    }
    
    
    
    protected function EventTop()
    {
        $sPeriod = Config::Get('module.topic.default_period_top');
        if (in_array(getRequestStr('period'), array(1, 7, 30, 'all'))) {
            $sPeriod = getRequestStr('period');
        }
        if (!$sPeriod) {
            $sPeriod = 1;
        }
        /**
         * Меню
         */
        $this->sMenuSubItemSelect = 'top';
        /**
         * Передан ли номер страницы
         */
        $iPage = $this->GetParamEventMatch(0, 2) ? $this->GetParamEventMatch(0, 2) : 1;
        if ($iPage == 1 and !getRequest('period')) {
            $this->Viewer_SetHtmlCanonical(Router::GetPath('index') . 'top/');
        }
        /**
         * Получаем список топиков
         */
        $aResult = $this->Topic_GetTopicsTop($iPage, Config::Get('module.topic.per_page'),
            $sPeriod == 'all' ? null : $sPeriod * 60 * 60 * 24);
        /**
         * Если нет топиков за 1 день, то показываем за неделю (7)
         */
        if (!$aResult['count'] and $iPage == 1 and !getRequest('period')) {
            $sPeriod = 7;
            $aResult = $this->Topic_GetTopicsTop($iPage, Config::Get('module.topic.per_page'),
                $sPeriod == 'all' ? null : $sPeriod * 60 * 60 * 24);
        }
        $aTopics = $aResult['collection'];
        /**
         * Вызов хуков
         */
        $this->Hook_Run('topics_list_show', array('aTopics' => &$aTopics));
        /**
         * Формируем постраничность
         */
        $aPaging = $this->Viewer_MakePaging($aResult['count'], $iPage, Config::Get('module.topic.per_page'),
            Config::Get('pagination.pages.count'), Router::GetPath('index') . 'top', array('period' => $sPeriod));
        /**
         * Загружаем переменные в шаблон
         */
        $this->Viewer_Assign('topics', $aTopics);
        $this->Viewer_Assign('paging', $aPaging);
        $this->Viewer_Assign('periodSelectCurrent', $sPeriod);
        $this->Viewer_Assign('periodSelectCurrentTitle', $this->Lang_Get('blog.menu.top_period_' . $sPeriod));
        $this->Viewer_Assign('periodSelectRoot', Router::GetPath('community') . 'top/');
        /**
         * Устанавливаем шаблон вывода
         */
        $this->SetTemplateAction('index');
        $this->Viewer_AddHtmlTitle($this->Lang_Get('blog.menu.all_top'));
        $this->Viewer_AddHtmlTitle($this->Lang_Get('blog.menu.top_period_' . $sPeriod));
    }

    /**
     * Вывод обсуждаемых топиков
     */
    protected function EventDiscussed()
    {
        $sPeriod = Config::Get('module.topic.default_period_discussed');
        if (in_array(getRequestStr('period'), array(1, 7, 30, 'all'))) {
            $sPeriod = getRequestStr('period');
        }
        if (!$sPeriod) {
            $sPeriod = 1;
        }
        /**
         * Меню
         */
        $this->sMenuSubItemSelect = 'discussed';
        /**
         * Передан ли номер страницы
         */
        $iPage = $this->GetParamEventMatch(0, 2) ? $this->GetParamEventMatch(0, 2) : 1;
        if ($iPage == 1 and !getRequest('period')) {
            $this->Viewer_SetHtmlCanonical(Router::GetPath('index') . 'discussed/');
        }
        /**
         * Получаем список топиков
         */
        $aResult = $this->Topic_GetTopicsDiscussed($iPage, Config::Get('module.topic.per_page'),
            $sPeriod == 'all' ? null : $sPeriod * 60 * 60 * 24);
        /**
         * Если нет топиков за 1 день, то показываем за неделю (7)
         */
        if (!$aResult['count'] and $iPage == 1 and !getRequest('period')) {
            $sPeriod = 7;
            $aResult = $this->Topic_GetTopicsDiscussed($iPage, Config::Get('module.topic.per_page'),
                $sPeriod == 'all' ? null : $sPeriod * 60 * 60 * 24);
        }
        $aTopics = $aResult['collection'];
        /**
         * Вызов хуков
         */
        $this->Hook_Run('topics_list_show', array('aTopics' => &$aTopics));
        /**
         * Формируем постраничность
         */
        $aPaging = $this->Viewer_MakePaging($aResult['count'], $iPage, Config::Get('module.topic.per_page'),
            Config::Get('pagination.pages.count'), Router::GetPath('index') . 'discussed', array('period' => $sPeriod));
        /**
         * Загружаем переменные в шаблон
         */
        $this->Viewer_Assign('topics', $aTopics);
        $this->Viewer_Assign('paging', $aPaging);
        $this->Viewer_Assign('periodSelectCurrent', $sPeriod);
        $this->Viewer_Assign('periodSelectCurrentTitle', $this->Lang_Get('blog.menu.top_period_' . $sPeriod));
        $this->Viewer_Assign('periodSelectRoot', Router::GetPath('community') . 'discussed/');
        /**
         * Устанавливаем шаблон вывода
         */
        $this->SetTemplateAction('index');
        $this->Viewer_AddHtmlTitle($this->Lang_Get('blog.menu.all_discussed'));
        $this->Viewer_AddHtmlTitle($this->Lang_Get('blog.menu.top_period_' . $sPeriod));
    }
    
}