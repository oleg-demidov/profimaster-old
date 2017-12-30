

{extends 'component@dropdown'}

{block 'dropdown_options' append}
    {component_define_params params=[ 'aItems', 'selectedItem' ]}
    {$classes = "{$classes} js-dropdown-select"}

    {if !$selectedItem and {$aItems|sizeof}}
        {$selectedItem = $aItems[0].value}
    {/if}
    
    {foreach from=$aItems item="aItem" name="dselect" key="dskey"}
        {$aItems[$dskey]['name'] = "n{$aItem.value}"}
        {$aItems[$dskey]['attributes'] = ['data-value' => $aItem.value]}
        {if $aItem.value == $selectedItem}
            {$text = $aItem.text}  
            {$icon = $aItem.icon} 
        {/if}
    {/foreach}
    
    {$activeItem = "n{$selectedItem}"}
    {$mods = $params.mods}
    {$menu = $aItems}
{/block}
