{$component = 'fl-market'}
{component_define_params params=[ 'target_type', 'target_id','text','mods' ]}


{component 'button.group' buttons = [
        [
        'text' => {$text|default:"Купить Pro"},
        'icon'=>'credit-card',
        'type' => "button" ,
        'mods' => "success {$mods}",
        'classes'=>"{$component}-button js-{$component}-modal-toggle",
        'attributes'=> [ 
            'data-params-target-type' => {$target_type|default:"index"},
            'data-params-target-id' => {$target_id|default:0},
            'data-lsmodaltoggle-modal' => "js-{$component}-modal" ]
        ]
]}


{component 'modal'
    title="Купить привилегии"
    content={component 'icon' icon="spinner" mods = 'spin 2x' classes="{$component}-loader"}
    id="js-{$component}-modal"
    classes="{$component}-modal"}
    