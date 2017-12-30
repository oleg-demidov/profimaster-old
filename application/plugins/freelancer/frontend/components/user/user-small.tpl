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

{$component = 'fl-user-list-small-item'}
{component_define_params params=[ 'selectable', 'oUser', 'mods', 'classes', 'attributes' ]}

{block 'user_list_small_item_options'}
    {$userId = $oUser->getId()}
{/block}

{if !$mods}
    {$mods = $oUser->getPro()}
{/if}

<div class="{$component} {cmods name=$component mods=$mods} js-user-list-small-item {$classes}" data-user-id="{$userId}" {cattr list=$attributes}>
    {* Чекбокс *}
    {if $selectable}
        <input type="checkbox" class="js-user-list-small-checkbox" data-user-id="{$userId}" data-user-login="{$oUser->getLogin()}" />
    {/if}

    {* Пользователь *}
    {block 'user_list_small_item_content'}
        {component 'user' template='avatar' size='xxsmall' mods='inline' user=$oUser}
    {/block}
    {if $mods == 'Pro' or $mods == 'Profi'}
        {component 'badge' value={$mods} classes="{$component}-{$mods}"}
    {/if}
    <div class="{$component}-rating">{$oUser->getRating()}</div>
</div>