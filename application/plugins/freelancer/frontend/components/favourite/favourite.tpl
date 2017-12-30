
{$component = "fl-favourite"}
{component_define_params params=[ 'oTarget', 'classes']}
{if $oTarget}
    {component 'favourite' 
    classes="{$component} {$classes} fl-favorite-tooltip" 
    attributes=['data-param-s-entity-name' => {$oTarget|get_class}, 'data-param-type' => 1] 
    target=$oTarget}
{/if}

