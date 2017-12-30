
{$component = 'fl-contacts-side'}
{component_define_params params=[ 'oUser', 'mods', 'classes', 'attributes' ]}


{block 'user_list_small_item_options'}
    {$userId = $oUser->getId()}
{/block}
{capture 'content'}
    <div>
    <div class="{$component} {$classes}" data-user-id="{$userId}" {cattr list=$attributes}>
        <div class="{$component}-sub">
            {component 'freelancer:user' template='avatar' size='xlarge' user=$oUser}
        </div>
        <div class="{$component}-sub">
            {$aGeo = $oUser->ygeo->getGeo()}
            {$sGeoUrl = {router page="freelancer/search?ygeo={$aGeo->getId()}"}}
            {component 'info-list' list=[
                [ 'label' => 'Рейтинг:', 'content' => {$oUser->getRating()} ],
                [ 'label' => 'Выполненных заказов:', 'content' => "<a href='#'>{$oUser->getCountOrdersDone()}</a>" ],
                [ 'label' => 'Отзывов:', 'content' => '<a href="#">10</a>' ],
                [ 'label' => 'Местоположение:', 'content' => "<a href='{$sGeoUrl}'>{$aGeo->getGeoRegionName()}</a>" ]
            ]}
        </div>
    </div>
{/capture}
{component 'block' content=$smarty.capture.content}