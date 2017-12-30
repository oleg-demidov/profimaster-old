{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-notify-list'}
{component_define_params params=[ 'aNotify', 'mods' , 'classes', 'back', 'classesItem' ]}
{foreach $aNotify as $oNotify}
    {component 'freelancer:notify.item' 
        attributes=['id' => "notify{$oNotify->getId()}"]
        classes=$classesItem 
        oNotify=$oNotify 
        mods="{$mods} {$oNotify->getType()}"}
{/foreach}
{if !sizeof($aNotify)}
    {component 'blankslate' title="Пусто"}
{/if}
