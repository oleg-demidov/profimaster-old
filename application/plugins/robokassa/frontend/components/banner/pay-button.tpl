{$component = 'robokassa-pay-button'}
{component_define_params params=[ 'oTarget' ]}


{component 'button' 
    classes=$component 
    url="{router page='robopay'}{$oTarget->getId()}"
    text="Оплатить"
    icon="credit_card"
    mods="warning"}

    