{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-master-list'}
{component_define_params params=[ 'aMasters', 'mods' , 'classes', 'back', 'classesItem' ]}
<div class="{$component} {$classes}">
{foreach $aMasters as $oMaster}
    {component 'freelancer:master.item' classes=$classesItem oMaster=$oMaster mods=$mods}
{/foreach}
</div>
