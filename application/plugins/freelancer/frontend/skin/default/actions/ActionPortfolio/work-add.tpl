{**
 * Поиск заказа
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    <h1>Добавление(редактирование) работы</h1>
    {component 'freelancer:portfolio.work.form' oWork=$oWork}
{/block}