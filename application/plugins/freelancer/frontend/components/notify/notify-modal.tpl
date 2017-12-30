{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{$component = 'fl-notify-modal'}
{component_define_params params=[ 'classes', 'content', 'attributes' ]}

{component 'modal' 
    primaryButton=['icon' => 'edit', 'url' => "{router page='settings/tuning'}#settings_tuning", 'mods' => '']
    title="Оповещения"
    content="<div class='fl-notify-angle'>&#9650;</div><div class='fl-notify-list'> $content </div>"
    classes="{$component} $classes"
    attributes = $attributes}