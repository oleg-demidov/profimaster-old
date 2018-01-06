{**
 * Тулбар
 * Кнопка перехода в админку
 *}

{if $oUserCurrent && $oUserCurrent->isAdministrator()}
    {component 'toolbar.item'
        html='<i class="ls-toolbar-icon"></i>'
        url={router page='admin'}
        attributes=[ 'title' => {lang 'admin.title'} ]
        mods='admin'}
{/if}