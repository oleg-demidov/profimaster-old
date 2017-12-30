{$component = "fl-favourites-buttons"}
{component_define_params params=[ 'url', 'strBeginRequest' ]}

{if !$strBeginRequest}
    {$strBeginRequest = '?'}
{/if}

{$aButs = [
    [ 'text' => 'Все', 'type' => "button", 'mods' => "small {if $favFilter != 'only'}primary{/if}",
        'url' => "{$url}"],
    [ 'text' => 'Избранное', 'type' => "button", 'mods' => "small {if $favFilter == 'only'}primary{/if}",
        'url' => "{$url}{$strBeginRequest}favourites=only"]
]}
   
{component 'button.group' classes={$component} buttons=$aButs}  