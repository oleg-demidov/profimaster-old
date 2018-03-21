{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{$component = 'fl-portfolio-work-small-list'}
{component_define_params params=[ 'aWorks', 'mods' ,'itemMods', 'classes', 'attributes' ]}
<div class="{cmods name=$component mods=$mods} {$component} {$classes}" {cattr list=$attributes}>
{foreach $aWorks as $oWork}
    {component 'freelancer:portfolio.work.small.item' classes=$classes oWork=$oWork mods=$itemMods}
{/foreach}
</div>
