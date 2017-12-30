{**
 * Добавление о заказе
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
     <form action="" method="post">
    {include '../layouts/about.tpl' }
    <input type="submit">
    </form>
{/block}