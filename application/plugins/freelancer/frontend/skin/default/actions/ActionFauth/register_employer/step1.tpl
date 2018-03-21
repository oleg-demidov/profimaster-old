{**
 * Добавление о себе
 *
 *}

{extends "layouts/layout.base.tpl"}


{block 'nav_main'}
    {component "freelancer:logo"}
    {component 'freelancer:breadcrumbs' list = [
    ['number' => 1, 'label' => 'Аккаунт'],
    ['number' => 2, 'label' => 'Активация']

    ] current = 1}
{/block}
{block 'layout_content' append}
    {*$aUserData|print_r*}
    {component 'freelancer:register.master.step3'}    
{/block}