
{$component = 'fl-breadcrumbs'}
{component_define_params params=[ 'list', 'current']}

<div class="{$component}">
{if is_array($list)}
    {foreach $list as $item}
        <div class="breadcrumb-item {if $item.number == $current}current{/if}">
            <span class="number">{$item.number}</span>
            <span class="label">{$item.label}</span>
        </div>
    {/foreach}
{/if}
</div>
    
