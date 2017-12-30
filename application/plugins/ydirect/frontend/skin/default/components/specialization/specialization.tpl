{**
 * Форма добавления/редактирования категории
 *}
{component_define_params params=[ 'checked' ]}

{component 'block' 
    title="Раскрутка анкеты в Яндексе"
    content={component "field.checkbox" name="ydirect" checked={$checkedYd|default:$checked} label="Включить"}}
