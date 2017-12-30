{**
 * Добавление заказа
 *
 *}
{extends "{$aTemplatePathPlugin.freelancer}actions/ActionUser/profile.tpl"}
{block 'profile_content' append}
    {if $oUserCurrent and $oUserCurrent->isEmployer()}
        {if $oUserCurrent->isCreateOrder()}
            {component 'button' 
                mods="success" 
                classes="{$component}-addorder" 
                text=$aLang.plugin.freelancer.menu.create_order 
                url={router page='order/add'}}
        {else}
            {component 'freelancer:market'  text=$aLang.plugin.freelancer.menu.create_order }      
        {/if}
    {/if}
    {capture 'paging'}
        {component 'pagination' 
            total=+$paging.iCountPage 
            current=+$paging.iCurrentPage 
            url="{$paging.sBaseUrl}/page__page__/{$paging.sGetParams}" 
            classes='js-pagination-orders'}
    {/capture}
    {$smarty.capture.paging}
    {component 'freelancer:order.list'  aOrders=$aOrders }
    {$smarty.capture.paging}
{/block}