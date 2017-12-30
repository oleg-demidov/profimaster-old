{**
 * Поиск заказа
 *
 *}

{extends "layouts/layout.base.tpl"}

{block 'layout_container_header' append}
    {insert name="block" block="search" 
        params=['plugin'=>'freelancer','entity'=>'PluginFreelancer_ModuleOrder_EntityOrder']}
{/block}

{block 'layout_content' append}
    {if {$aOrders|@sizeof}}
        {$oTarget = $aOrders[0]}
    {/if}
    
    {capture 'paging'}
        {component 'pagination' 
            total=+$paging.iCountPage 
            current=+$paging.iCurrentPage 
            url="{$paging.sBaseUrl}/page__page__/{$paging.sGetParams}" 
            classes='js-pagination-orders'}
    {/capture}
    
    {$smarty.capture.paging}
    
    {component "freelancer:order.order-list" aOrders=$aOrders}
    {$smarty.capture.paging}
{/block}