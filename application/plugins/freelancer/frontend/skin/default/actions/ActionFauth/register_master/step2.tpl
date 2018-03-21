{**
 * Добавление о себе
 *
 *}

{extends "layouts/layout.base.tpl"}

{block 'nav_main'}
    {component "freelancer:logo"}
    {component 'freelancer:breadcrumbs' list = [
    ['number' => 1, 'label' => 'Выбрать специализацию'],
    ['number' => 2, 'label' => 'О себе'],
    ['number' => 3, 'label' => 'Аккаунт'],
    ['number' => 4, 'label' => 'Активация']

    ] current = 2}
{/block}

{block 'layout_content' append}
    {component 'freelancer:register.master.step2' oUser=$oUser}    
{/block}