{**
 * Вход
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    <h1>Вход</h1>
    <form action="" method="post">
        Номер телефона или Email: <input type="text" name="email_or_number" value="{$sEmailOrNumber}"><br>
        Пароль: <input type="password" name="pass" value="">
        <br>или<br>
        {hook run='form_login_begin'}
        <br>
        <input type="submit" value="Дальше">
    </form>
{/block}