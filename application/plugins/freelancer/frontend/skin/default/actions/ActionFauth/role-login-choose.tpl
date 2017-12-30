{**
 * Вход
 *
 *}

{extends "layouts/layout.base.tpl"}

{block 'layout_page_title'}
    {$aLang.auth.registration.title}
{/block}
{block 'layout_content'}
    {component 'freelancer:auth.role-login-choose'}
{/block}