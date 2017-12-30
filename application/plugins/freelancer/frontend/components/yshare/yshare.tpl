{component_define_params params=[ ]}

<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js" async="async"></script>

{function name="get_params_share"}
    {foreach from=$params key='pkey' item='value'}
        data-{$pkey}="{$value}"
    {/foreach}
{/function}

<div>{$label}</div>
<div class="ya-share2" 
    {get_params_share}></div>