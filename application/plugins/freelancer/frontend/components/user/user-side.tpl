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

{$component = 'fl-user-side'}
{component_define_params params=[ 'oUser', 'mods', 'classes', 'attributes' ]}

{if !$mods}
    {$mods = $oUser->getPro()}
{/if}
{block 'user_list_small_item_options'}
    {$userId = $oUser->getId()}
    {$sRole = $oUser->getStrRole()}
    {$sDoneOrder = {lang name="plugin.freelancer.str_user_role.{$sRole}"}}
    {$aRoleOrder = [ 'label' => "{component 'icon' icon='cart-plus'} {$sDoneOrder} заказов:", 
                    'content' => "<a href={Router::GetPath('order/list/user')}{$oUser->getId()}>{$oUser->getCountOrdersDone()}</a>" ]}
{/block}
{capture 'title'}
    {component 'icon' icon='user'} {lang name="plugin.freelancer.user_role.{$sRole}"}
{/capture}
{capture 'content'}
    <div>
    <div class="{$component} {$classes}" data-user-id="{$userId}" {cattr list=$attributes}>
        <div class="{$component}-sub">
            {component 'freelancer:user' template='avatar' size='large' user=$oUser}
            
            <br><a class="{$component}-a" href="{$oUser->getUserWebPath()}">
            {if $oUser->getProfileName()}{$oUser->getProfileName()}{else}{$oUser->getLogin()}{/if}
            {if $mods == 'Pro' or $mods == 'Profi'}
                {component 'badge' value={$mods} classes="{$component}-{$mods}"}
            {/if}</a>
        </div>
        <div class="{$component}-sub">
            {$aGeo = $oUser->ygeo->getGeo()}
            {if !$sGeoUrl}
                {$sGeoUrl = '#'}
            {/if} 
            {$aList = [
                [ 'label' => "{component 'icon' icon='star'} Рейтинг:", 
                    'content' => {$oUser->getRating()} ],
                [ 'label' => "{component 'icon' icon='comments-o'} Отзывов:", 
                    'content' => '<a href="#">{$oUser->getCountResponse()}</a>' ],
                [ 'label' => "{component 'icon' icon='map-marker'} Местоположение:", 
                    'content' => "<a href='{$sGeoUrl}'>{$aGeo->getGeoRegionName()}</a>" ]
            ]}
            {if $aRoleOrder}
                {$aList[] = $aRoleOrder}
            {/if}
            
            {component 'info-list' list=$aList}
        </div>
    </div>
{/capture}
{component 'block' title=$smarty.capture.title content=$smarty.capture.content}
