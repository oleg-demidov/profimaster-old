{**
 * Добавление о себе
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
     <form action="" method="post">
    {include '../layouts/contacts.tpl' }
    <input type="submit">
    </form>
    {* Скрытое пользовательское поле для вставки через js *}
    {* Вынесено за пределы формы, чтобы не передавалось при отправке формы *}
    {call userfield field=false}
{/block}