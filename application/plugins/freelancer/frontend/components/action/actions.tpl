{$component = 'fl-actions'}
{component_define_params params=[ 'aActions', 'aPaging' ]}


{capture 'paging'}
    {component 'pagination' 
        total=+$aPaging.iCountPage 
        current=+$aPaging.iCurrentPage 
        url="{$aPaging.sBaseUrl}/page__page__/{$aPaging.sGetParams}"}
{/capture}
    
{$smarty.capture.paging}

<div class="{$component}">
    {foreach  $aActions as $oAction}
        {component 'freelancer:action.item' oAction=$oAction}
    {/foreach}
</div>

{$smarty.capture.paging}
    