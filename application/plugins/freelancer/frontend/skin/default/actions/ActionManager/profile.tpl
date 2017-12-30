{**
 * Добавление о себе
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    {component 'freelancer:user.profile' oUser=$oUserProfile}<br>
    {if $oUserCurrent} 
        {if $oUserCurrent->isAdministrator() or $oUserCurrent->getId() == $oUserProfile->getId() }
        {component 'info-list' mods="large" list=[[
            'label' => 'Баланс', 
            'icon' => 'money', 
            'content' => "{$fBalance} {Config::Get('plugin.freelancer.market.str_currency')}" ]]}
        {/if}
    {/if}
    {component 'freelancer:manager.invite-but' oUser=$oUserProfile}
    {component 'freelancer:manager.wall.buttons' oUser=$oUserProfile sCurrentPage=$sCurrentPage}
    
    {block 'profile_content'}
        

    {/block}
{/block}