
{$component = 'fl-top-masters'}
{component_define_params params=['aMasters']}


{capture 'title'}
    {component 'icon' icon='user'} Лучшие мастера
{/capture}
{capture 'content'}
    {foreach $aMasters as $oMaster}
        {component 'freelancer:user.block.top-master-item' oMaster=$oMaster}
    {/foreach}
{/capture}
{component 'block' title=$smarty.capture.title mods='success' content=$smarty.capture.content}