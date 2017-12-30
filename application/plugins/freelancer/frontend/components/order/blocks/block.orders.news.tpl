{**
*  Шблон блока OrdersNews
*
*}
{if $aOrders|@sizeof}
    {capture 'content'}
        {foreach $aOrders as $oOrder}
            {component "freelancer:order.block.news.item" oOrder=$oOrder}
        {/foreach}
    {/capture}
    {component 'block' title="Новые заказы" content=$smarty.capture.content}
{/if}