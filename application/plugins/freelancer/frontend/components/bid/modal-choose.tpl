
{component_define_params params=[ 'oUser', 'oBid' ]}

{component 'button.group' buttons=[
        [ 'text' => $aLang.plugin.freelancer.text.order.accept_bid, 
            'icon'=>'user',
            'type' => "button", 
            'mods' => 'success', 
            "classes"=>"js-master-modal-toggle",
            'attributes'=>[ 'data-lsmodaltoggle-modal' => "master-confirm-modal-{$oBid->getId()}" ]]
    ]}


{capture 'small_user'}
    {component 'freelancer:user.middle' oUser=$oUser}
    {component 'info-list' list=[
        [ 'label' => "{component 'icon' icon='money'} Бюджет:", 
                    'content' => {$oBid->getPrice()} ]
    ]}
{/capture}

{component 'modal'
    title=$aLang.plugin.freelancer.text.order.choose_master_accept_bid
    content=$smarty.capture.small_user
    id="master-confirm-modal-{$oBid->getId()}"
    classes='js-master-confirm-modal'
    primaryButton=[ 
        'text' => $aLang.plugin.freelancer.text.order.accept, 
        'type' => "button", 
        'mods' => 'success', 
        'url'=>{router page="order/{$oBid->getOrderId()}/choose_master/{$oBid->getId()}"}]}
    