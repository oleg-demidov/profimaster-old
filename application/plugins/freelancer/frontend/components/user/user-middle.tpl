{**
 * Список пользователей с элементами управления / Пользователь
 *
 * @param object  $user
 * @param string  $selectable
 * @param string  $showActions
 * @param string  $showRemove
 *
 * @param string $classes
 * @param array  $attributes
 * @param array  $mods
 *}

{$component = 'fl-user-middle-item'}
{component_define_params params=[ 'oUser', 'mods', 'classes', 'attributes' ]}
{$userId = $oUser->getId()}


<div class="{$component} {$classes}" data-user-id="{$userId}" {cattr list=$attributes}>
    {if !$mods}
        {$mods = $oUser->getPro()}
    {/if}
    <div class="fl-block-in-line">
    {* Пользователь *}
    {component 'user' template='avatar' size='small' user=$oUser}
    {if $mods == 'Pro' or $mods == 'Profi'}
        {component 'badge' value={$mods} classes="{$component}-{$mods}"}
    {/if}
    </div>
    <div class="fl-block-in-line">
        {$aGeo = $oUser->ygeo->getGeo()}
        {$sGeoUrl = {router page="user/search?ygeo={$aGeo->getId()}"}}
        {$sRoleOrders = {lang name="plugin.freelancer.str_user_role.{$oUser->getStrRole()}"}}
        {component 'info-list' list=[
            [ 'label' =>  "{component 'icon' icon='user'} Роль:", 'content' => {lang name="plugin.freelancer.user_role.{$oUser->getStrRole()}"} ], 
            [ 'label' =>  "{component 'icon' icon='star'} Рейтинг:", 'content' => {$oUser->getRating()} ],            
            [ 'label' => "{component 'icon' icon='map-marker'} Местоположение:", 
                'content' => "<a href='{$sGeoUrl}'>{$aGeo->getGeoRegionName()}</a>" ],
            [ 'label' => "{component 'icon' icon='comments-o'} Отзывов:", 
                'content' => "<a href='{$oUser->getUserWebPath()}responses'>{$oUser->getCountResponse()}</a>" ]
        ]}
        {*,
            [ 'label' => "{component 'icon' icon='cart-plus'} {$sRoleOrders}  заказов:", 
                'content' => "<a href='{$oUser->getUserWebPath()}orders'>{$oUser->getCountOrdersDone()}</a>" ],*}
    </div>
</div>