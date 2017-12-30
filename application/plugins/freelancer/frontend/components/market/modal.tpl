{$component = 'fl-market-modal'}
{component_define_params params=[  ]}

{component 'modal'
    title="Купить привилегии"
    content={component 'icon' icon="spinner" mods = 'spin 2x' classes="{$component}-loader"}
    id="js-{$component}"
    classes="{$component}"}
   