{**
 * Добавление заказа
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    <h1>{$aLang.plugin.freelancer.text.form.order.header}</h1>
    {component 'freelancer:order.form' oOrder=$oOrder}
{/block}