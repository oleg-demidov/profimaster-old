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

{$component = 'fl-employer-side'}
{component_define_params params=[ 'oUser', 'mods', 'classes', 'attributes' ]}


{block 'user_list_small_item_options'}
    {$userId = $oUser->getId()}
{/block}
{capture 'title'}
    {component 'icon' icon='user'} Профиль
{/capture}
{capture 'content'}
    <div>
    <div class="{$component} {$classes}" data-user-id="{$userId}" {cattr list=$attributes}>
        <div class="{$component}-sub">
            {component 'freelancer:user' template='avatar' size='large' user=$oUser}
            <br><a class="{$component}-a" href="{$oUser->getUserWebPath()}">
            {if $oUser->getProfileName()}{$oUser->getProfileName()}{else}{$oUser->getLogin()}{/if}
            </a>
        </div>
        <div class="{$component}-sub">
            {$aGeo = $oUser->ygeo->getGeo()}
            {$sGeoUrl = {router page="freelancer/search?ygeo={$aGeo->getId()}"}}
            {component 'info-list' list=[
                [ 'label' => "{component 'icon' icon='user'} Роль:", 
                    'content' => {$oUser->getStrRole()} ],
                [ 'label' => "{component 'icon' icon='star'} Рейтинг:", 
                    'content' => {$oUser->getRating()} ],
                [ 'label' => "{component 'icon' icon='cart-plus'} {lang get='plugin.freelancer.str_user_role.{$oUser->getStrRole()}'} заказов:", 
                    'content' => "<a href={Router::GetPath('order/list/user')}{$oUser->getId()}>{$oUser->getCountOrdersDone()}</a>" ],
                [ 'label' => "{component 'icon' icon='comments-o'} Отзывов:", 
                    'content' => '<a href="#">10</a>' ],
                [ 'label' => "{component 'icon' icon='map-marker'} Местоположение:", 
                    'content' => "<a href='{$sGeoUrl}'>{$aGeo->getGeoRegionName()}</a>" ]
            ]}
        </div>
    </div>
{/capture}
{component 'block' title=$smarty.capture.title content=$smarty.capture.content}