{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'freelancer-order-email-list'}
{component_define_params params=[ 'sTitle', 'aOrders' ]}

<h1>{$sTitle}</h1>
{$iCount = sizeof($aOrders)}
{$i=0}
{foreach $aOrders as $oOrder}
    {if $i<5}
        {component 'freelancer:notify.email.order.item' oOrder=$oOrder}
        {$i=$i+1}
    {/if}
{/foreach}
{if {$iCount - $i}}
    &nbsp;&nbsp;
    {component 'freelancer:email.button' url="{router page="order/search"}" text="Еще {$iCount - $i}"}
{/if}
