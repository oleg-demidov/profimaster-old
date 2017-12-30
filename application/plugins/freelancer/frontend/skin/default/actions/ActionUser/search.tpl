{**
 * Поиск заказа
 *
 *}

{extends "layouts/layout.base.tpl"}

{block 'layout_container_header' append}
    {insert name="block" block="search" 
        params=['plugin'=>'freelancer','entity'=>'User_User']}
{/block}
                
{block 'layout_content' append}
    
    {capture 'pagination'}
        {component 'pagination' 
            total=+$aPaging.iCountPage 
            current=+$aPaging.iCurrentPage 
            url="{$aPaging.sBaseUrl}/page__page__/{$aPaging.sGetParams}" 
            classes='js-pagination-users'}
    {/capture}
    {$smarty.capture.pagination}
    {component "freelancer:master.list" aMasters=$aFreelancers}
    {if !{$aFreelancers|sizeof}}
        {component 'blankslate' title="Резултатов нет"}
    {/if}    
    {$smarty.capture.pagination}

{/block}