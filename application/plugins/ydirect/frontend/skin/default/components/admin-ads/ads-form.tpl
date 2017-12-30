{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = "yd-ads-form"}
 
 <div class="{$component}">
    {component 'field.text' label="Заголовок" classes="{$component}-title" name="title" }
    {component 'field.text' label="Текст" classes="{$component}-text" name="text"}
    {component 'button' type="button" classes="{$component}-add"  text="Добавить"}
 </div>
