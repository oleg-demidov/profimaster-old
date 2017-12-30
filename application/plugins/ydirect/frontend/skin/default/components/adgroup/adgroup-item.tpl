{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = "js-adgroup-item"}
{component_define_params params=[ 'oAdGroup' ]}

{capture 'content'}
    <div class='ls-grid-row'>
        <div class="ls-grid-col ls-grid-col-6">
        {component 'user.list-item' user=$oAdGroup->getUser()}
        </div>
        <div class="ls-grid-col ls-grid-col-6">
        {$oCampaign = $oAdGroup->getCampaign()}
        {$aCategories = $oAdGroup->getUser()->category->getCategories()}
        {capture name="categories"}
        {component 'badge' value={$oCampaign->getName()}} 
        {/capture}



        {$aAds = $oAdGroup->getAds()}
        {$iAds = {$aAds|@sizeof}}

        {component 'info-list' list=[
            [ 'label' => 'Кампании:', 'content' => $smarty.capture.categories ],
            [ 'label' => 'Ключевые слова:', 'content' => $oAdGroup->getKeywordsStr() ],
            [ 'label' => 'Обьявлений:', 'content' => $iAds ]
        ]}
        {component 'button' template='toolbar' groups=[
            [
                'buttons' => [
                    [ 
                        'icon' => 'edit', 
                        'url' => "{router page='admin/plugin/ydirect/adgroup/edit'}{$oAdGroup->getId()}",
                        'text' => 'Редактировать'
                    ]
                ]
            ]
        ]}
        </div>
    </div>
{/capture}

{component 'block' title="" classes="{$component}" content=$smarty.capture.content}


