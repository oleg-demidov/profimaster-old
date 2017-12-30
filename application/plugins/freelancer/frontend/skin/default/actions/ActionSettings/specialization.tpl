{**
 * Основные настройки профиля
 *}
{extends 'layouts/layout.user.settings.tpl'}

{block 'layout_content' append}
    {component 'freelancer:user' template='settings/specialization' user=$oUserCurrent}
{/block}