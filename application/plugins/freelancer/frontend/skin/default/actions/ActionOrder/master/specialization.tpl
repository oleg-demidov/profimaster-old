{**
 * Добавление категории
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
     <form action="" method="post">
    {include '../layouts/specialization.tpl' }
    <input type="submit">
    </form>
{/block}