{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{component_define_params params=[ 'aUsers' ]}
<div class="js-ads-items">
{foreach $aUsers as $oUser}
    {component 'ydirect:admin-ads.item-new' oUser=$oUser}
{/foreach}
</div>
