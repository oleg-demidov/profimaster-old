{**
 * Добавление заказа
 *
 *}
{extends "{$aTemplatePathPlugin.freelancer}actions/ActionManager/profile.tpl"}
{block 'profile_content' append}
    {if !{$aUsersInvite|sizeof}}
        {component 'blankslate' title="Пусто"}
    {else}
        {component 'freelancer:manager.invites' aUsersInvite=$aUsersInvite}
    {/if}
{/block}