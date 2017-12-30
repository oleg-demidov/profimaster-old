{**
 * Добавление заказа
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    <h1>{$aLang.plugin.freelancer.menu.orders} {if $oUserCurrent->getProfileName()}
        {$oUserCurrent->getProfileName()}{else}{$oUserCurrent->getLogin()}{/if}</h1>
    {capture 'paging'}
        {component 'block' content={component 'pagination' 
        total=+$aPaging.iCountPage 
        current=+$aPaging.iCurrentPage 
        url="{$aPaging.sBaseUrl}/page__page__/{$aPaging.sGetParams}"}}
    {/capture}
    {$smarty.capture.paging}
    {component 'freelancer:order.list' aOrders=$aOrders back={router page={Router::GetActionEventName()}}}
    {$smarty.capture.paging}
{/block}