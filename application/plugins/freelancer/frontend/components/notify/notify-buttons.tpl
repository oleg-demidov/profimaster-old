{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-notify-buttons'}
{component_define_params params=[ 'oNotify', 'mods','back','attributes' ]}

{component 'button.group' attributes = $attributes buttons=[
    ['text' => 'Скрыть', 'classes' => "{$component}-hide", 'mods'=>"xsmall primary"]
]}
