{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{$component = 'fl-response-list'}
{component_define_params params=[ 'aResponses', 'mods' ,'itemMods', 'classes', 'back' ]}
<div class="{cmods name=$component mods=$mods} {$component} {$classes}">
{if !{$aResponses|@sizeof}}
    {component 'blankslate' title = 'Отзывов пока нет'}
{/if}
{foreach $aResponses as $oResponse}
    {component 'freelancer:response.item' classes=$classes oResponse=$oResponse mods=$itemMods}
{/foreach}
</div>
