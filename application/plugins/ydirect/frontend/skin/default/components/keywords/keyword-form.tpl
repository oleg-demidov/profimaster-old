{**
 * Форма добавления/редактирования категории
 *}
{$component = "yd-keyword-form"}
{component_define_params params=[ 'oAdGroup' ]}

<div class="{$component}">
    {component 'field.text' classes="{$component}-field" }
    {component 'button' type="button" classes="{$component}-add"  text="Добавить"}
</div>