{**
 * Поиск заказа
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'after_nav_main' append}
    {component 'freelancer:banner'}
{/block}

{block 'layout_content' append}
    {insert name="block" block="searchIndex" params=['plugin'=>'freelancer']}
{/block}