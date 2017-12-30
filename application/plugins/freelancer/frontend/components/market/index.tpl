{$component = 'fl-market-index'}
{component_define_params params=[ 'aRoles' ]}


<div class="{$component}">
    {$aTabs = []}
    {foreach $aRoles as $oRole}
        {$aTabs[] = [ 'text' => $oRole->getTitle(), content => {component 'freelancer:market.role' oRole=$oRole}]}
    {/foreach}
    {component 'tabs' classes="js-{$component}-tabs" tabs=$aTabs}
</div>
    