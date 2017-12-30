{**
 * Добавление заказа
 *
 *}
{extends "{$aTemplatePathPlugin.freelancer}actions/ActionUser/profile.tpl"}
{block 'profile_content' append}
    {capture 'paging'}
        {component 'pagination' 
            total=+$aPaging.iCountPage 
            current=+$aPaging.iCurrentPage 
            url="{$aPaging.sBaseUrl}/page__page__/{$aPaging.sGetParams}" 
            classes='js-pagination-works'}
    {/capture}
    {if $oUserCurrent and $oUserCurrent->getId() == $oUser->getId() }
        {if $oUserCurrent->isCreatePortfolio()}
            {component 'button' type="button" url={router page="portfolio/work/add"} text="Добавить работу"}
        {else}
            {component 'freelancer:market'  text="Добавить работу"}
        {/if}
    {/if}
    {if !$aWorks|@sizeof}
        {component 'blankslate' title="Работ нет"}
    {/if}
    {$smarty.capture.paging}
    {component 'freelancer:portfolio.work.list'  aWorks=$aWorks }
    {$smarty.capture.paging}
{/block}