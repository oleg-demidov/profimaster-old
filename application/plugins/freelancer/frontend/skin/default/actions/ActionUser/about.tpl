{**
 * Добавление заказа
 *
 *}
{extends "{$aTemplatePathPlugin.freelancer}actions/ActionUser/profile.tpl"}
{block 'profile_content' append}
    {if $oUserCurrent and ($oUserCurrent->getId() == $oUserProfile->getId() or $oUserCurrent->isAdministrator())}
        {component 'button' text="Редактировать" icon="edit" url="{router page='settings/profile'}#profile_about"}
    {/if}
    {if $oUserProfile->getProfileAbout()}
        {component 'text' classes="fl-profile-about" text={$oUserProfile->getProfileAbout()}}
    {else}
        {component 'blankslate' title="Описания нет"}
    {/if}
{/block}