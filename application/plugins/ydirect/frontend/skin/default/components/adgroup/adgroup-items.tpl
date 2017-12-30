{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{component_define_params params=[ 'aAdGroups' ]}
<div class="js-adgroup-items">
    {if !{$aAdGroups|@sizeof}}
        {component 'blankslate' text="Нет обьявлений"}
    {/if}
{foreach $aAdGroups as $oAdGroup}
    {component 'ydirect:adgroup.item' oAdGroup=$oAdGroup}
{/foreach}
</div>

