{$component = 'fl-market'}
{component_define_params params=[ 'sTargetType', 'iTargetId','text' ]}

{component 'button' 
    text = {$text|default:"Купить Pro"}
    icon='credit-card'
    type = "button" 
    mods = 'success'
    classes="{$component}-button js-{$component}-modal-toggle"
    attributes= [ 
        'data-params-target-type' => {$sTargetType|default:"index"},
        'data-params-target-id' => {$iTargetId|default:0},
        'data-lsmodaltoggle-modal' => "js-{$component}-modal" ]
    }


{component 'modal'
    title="Купить привилегии"
    content={component 'icon' icon="spinner" mods = 'spin 2x' classes="{$component}-loader"}
    id="js-{$component}-modal"
    classes="{$component}-modal"}
    