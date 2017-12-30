{**
 * Добавление заказа
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    {component 'freelancer:order'  oOrder=$oOrder }
   
{/block}