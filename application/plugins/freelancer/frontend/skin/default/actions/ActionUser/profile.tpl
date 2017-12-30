{**
 * Добавление о себе
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    {component 'freelancer:user.profile' oUser=$oUserProfile}
        <br>
    
    {block 'profile_content'}
        {component 'freelancer:user.wall-buttons' oUser=$oUserProfile sCurrentPage=$sCurrentPage}

    {/block}
{/block}