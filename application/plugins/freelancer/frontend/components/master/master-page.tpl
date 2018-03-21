{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-master-page'}
{component_define_params params=[ 'aMasters', 'aPaging', 'classes', 'sBaseUrl' ]}

<div class="{$component} {$classes}" data-s-base-url="{$sBaseUrl}" data-i-current-page="{$aPaging.iCurrentPage|default:1}">
    {capture 'pagination'}
            {component 'pagination' 
                total=+$aPaging.iCountPage 
                current=+$aPaging.iCurrentPage 
                url="{$aPaging.sBaseUrl}/page__page__/{$aPaging.sGetParams}" 
                classes='js-pagination-users'}
    {/capture}

    {$smarty.capture.pagination}

    {component "freelancer:master.list" aMasters=$aMasters}
    {if !{$aMasters|sizeof}}
        {component 'blankslate' title="Результатов нет"}
    {/if}    

    {$smarty.capture.pagination}

</div>