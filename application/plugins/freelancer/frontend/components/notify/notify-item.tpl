{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-notify-item'}
{component_define_params params=[ 'oNotify', 'mods','back','attributes' ]}

{capture 'title'}
    {$oNotify->getTitle()}
    <span class="{$component}-date">{$oNotify->getDateCreate()}</span>
{/capture}

{capture 'content'}
    {$oNotify->_getOriginalDataOne('text')}
{/capture}

{capture 'footer'}
    {component 'freelancer:notify.buttons' attributes=['data-i-notify-id' => $oNotify->getId() ]}
{/capture}

{component 'block' 
    mods=$mods
    attributes=$attributes
    classes="{cmods name=$component mods=$mods} {$component}"
    content=$smarty.capture.content
    footer=$smarty.capture.footer
    title=$smarty.capture.title
}
