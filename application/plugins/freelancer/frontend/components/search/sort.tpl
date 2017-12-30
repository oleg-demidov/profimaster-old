{extends 'component@field.field'}


{block 'field_options' append}
{$component_sort = "fl-search-sort"}
{component_define_params params=[ 'orderItems' ]}
{/block}



{block 'field_input'}
    {$buttons = []}
    {foreach $orderItems as $Item}
        {if $Item.value}
            {component 'field.hidden' classes="{$component_sort}-hidden" name=$Item.name value=$Item.value}
        {/if}
        {$icon = ($Item.value)?"sort-amount-{$Item.value}":"random"}
        {$buttons[] = [
            'icon' =>$icon,
            'value'=>{$Item.value}, 
            'attributes' => ['name_hid' => $Item.name],
            'text' =>{$Item.text},
            'type' =>'button',
            'classes' =>"{$component_sort}-button" ]}
    {/foreach}
    {component 'button' template='group' classes="{$component_sort}-buttons" buttons=$buttons}
{/block}