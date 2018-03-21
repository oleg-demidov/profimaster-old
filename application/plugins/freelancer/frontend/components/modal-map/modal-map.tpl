{$component = 'fl-modal-map'}
{component_define_params params=[ 'oGeo', 'url', 'icon', 'text',  'mods', 'classes', 'attributes' ]}

{$url = {$url|default:'#'}}

{if $oGeo}
    {$attributes['data-lat'] =  $oGeo->getLat()}
    {$attributes['data-long'] =  $oGeo->getLong()}
    {$attributes['data-zoom'] =  $oGeo->getZoom()}
{/if}

<a  href="{$url}" 
    title="{$text}"
    class="{$component} {cmods name=$component mods=$mods} {$classes}"      
    {cattr list=$attributes}>
        {component 'icon' icon={$icon|default:'map-marker'}} 
        {$text}
</a>
