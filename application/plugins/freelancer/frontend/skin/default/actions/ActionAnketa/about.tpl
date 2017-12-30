{**
 * Добавление о себе
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    {$sFields}
    <h1>Описание о себе</h1>
    <form action="" method="post">
        <textarea name='text_about'>{$sTextAbout}</textarea>
        {*component 'field' template='select' params=[ 'items', 'isMultiple', 'selectedValue' ]*}
        <input type="text" size="15" name="price" value="{$fPrice}"/>
        <input type="submit" value="Save">
    </form>
{/block}