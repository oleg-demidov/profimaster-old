{**
 * Добавление заказа
 *
 *}
{extends "{$aTemplatePathPlugin.freelancer}actions/ActionManager/profile.tpl"}
{block 'profile_content' append}
    {if $oUserCurrent and  $oUserCurrent->getId() != $oUser->getId() and $oUserCurrent->isCreateResponse()}
        {component 'button' text="Оставить отзыв" url={router page="freelancer/{$oUser->getId()}/response/add"}}
    {/if}
    {capture 'paging'}
        {component 'pagination' 
            total=+$paging.iCountPage 
            current=+$paging.iCurrentPage 
            url="{$paging.sBaseUrl}/page__page__/{$paging.sGetParams}" 
            classes='js-pagination-orders'}
    {/capture}
    {$smarty.capture.paging}
    {component 'freelancer:response.list'  aResponses=$aResponses }
    {$smarty.capture.paging}
{/block}