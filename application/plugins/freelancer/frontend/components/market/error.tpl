{$component = 'fl-market-error'}
{component_define_params params=[ 'url', 'text' ]}

{component 'blankslate'
    title = $text
    text  = {component 'button' url=$url mods="primary" text="Перейти"}}
    