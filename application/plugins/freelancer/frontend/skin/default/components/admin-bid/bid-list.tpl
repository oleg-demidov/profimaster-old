{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{component_define_params params=[ 'aBids' ]}
<div class="js-bid-items">
{foreach $aBids as $oBid}
    {component 'freelancer:admin-bid.item' oBid=$oBid}
{/foreach}
</div>
