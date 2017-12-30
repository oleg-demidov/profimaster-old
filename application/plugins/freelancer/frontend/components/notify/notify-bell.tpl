{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-notify-bell'}
{component_define_params params=[ 'oUser', 'mods','back','attributes', 'count' ]}

{component 'nav' template='item'
        mods="bell"
        isRoot   = 1
        activeItem = 1
        isActive = 0
        params   = [
            'icon' => 'bell',
            'classes' => 'js-fl-notify-bell-toggle',
            'attributes' => ['data-lsmodaltoggle-modal' => "js-fl-notify-modal"],
            'count' => $count
        ]}

{component 'freelancer:notify.modal' attributes=[ 'id' => 'js-fl-notify-modal']}
