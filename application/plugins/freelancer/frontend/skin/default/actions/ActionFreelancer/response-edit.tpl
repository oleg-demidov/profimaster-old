{**
 * Поиск заказа
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    <h1>Редактировать отзыв</h1>
    {component 'freelancer:response.form' oResponse=$oResponse}
{/block}