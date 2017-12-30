{**
 * Поиск заказа
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    <h1>{$aLang.plugin.freelancer.text.freelancer_search}</h1>
    {insert name="block" block="search" 
        params=['plugin'=>'freelancer','entity'=>'PluginFreelancer_ModuleOrder_EntityOrder']}
        {component "user.list" users=$aFreelancers}
        {component 'pagination' 
        total=+$aPaging.iCountPage 
        current=+$aPaging.iCurrentPage 
        url="{$aPaging.sBaseUrl}/page__page__/{$aPaging.sGetParams}" 
        classes='js-pagination-users'}

{/block}