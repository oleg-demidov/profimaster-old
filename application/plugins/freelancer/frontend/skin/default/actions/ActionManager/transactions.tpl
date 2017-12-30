{**
 * Добавление заказа
 *
 *}
{extends "{$aTemplatePathPlugin.freelancer}actions/ActionManager/profile.tpl"}
{block 'profile_content' append}
    {if !{$aTransactions|sizeof}}
        {component 'blankslate' title="Пусто"}
    {else}
        {component 'freelancer:manager.transactions' aTransactions=$aTransactions}
    {/if}
{/block}