{**
 * Добавление заказа
 *
 *}
{extends "{$aTemplatePathPlugin.freelancer}actions/ActionManager/profile.tpl"}
{block 'profile_content' append}
    {if !{$aPayments|sizeof}}
        {component 'blankslate' title="Пусто"}
    {else}
        {component 'freelancer:manager.payments' aPayments=$aPayments}
    {/if}
{/block}