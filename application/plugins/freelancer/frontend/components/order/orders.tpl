{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-order-list'}
{component_define_params params=[ 'aOrders', 'mods' , 'classes', 'back' ]}
<div class="{$component} js-order-items">
{if !{$aOrders|@sizeof}}
    {component 'blankslate' title = 'Заказов пока нет'}
{/if}
{foreach $aOrders as $oOrder}
    {component 'freelancer:order.order-list-item' classes=$classes oOrder=$oOrder mods=$mods back=$back}
{/foreach}
</div>
