{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{$component = 'fl-portfolio-work-list'}
{component_define_params params=[ 'aWorks', 'mods' ,'itemMods', 'classes' ]}
<div class="{cmods name=$component mods=$mods} {$component} {$classes}">
{foreach $aWorks as $oWork}
    {component 'freelancer:portfolio.work.item' classes=$classes oWork=$oWork mods=$itemMods}
{/foreach}
</div>
