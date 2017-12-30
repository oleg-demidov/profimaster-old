{$component = "fl-order-actionbar"}
{component_define_params params=[ 'oOrder' ]}


{*[
    'buttons' => [
        {component 'freelancer:favourite' oTarget=$oMaster classes="js-master-favourite"}
    ]
]*}
{$aItems = []}
{if $oUserCurrent}
    {if $oUserCurrent->isMaster()}
        {if $oOrder->isCanBid($oUserCurrent)}
            {$aItems[] = [
                'buttons' => [
                    [ 
                        'icon' => 'envelope-o', 
                        'text' => 'Откликнуться',
                        'mods' => 'success',
                        'url' => "{router page='order'}{$oOrder->getId()}#form-bid"
                    ]           
                ]
            ]}
        {/if}
        {if $oOrder->getStatus() == 'master_wait'}
            {$aItems[] = [
                'buttons' => [
                    [ 
                        'icon'=>'check',
                        'mods' => 'success',
                        'text' => 'Принять',
                        'url' => "{router page='order'}{$oOrder->getId()}"
                    ] 
                ]
            ]}
        {/if}
    {/if}
    {if $oOrder->isCreator($oUserCurrent)}
        {$aItems[] = [
            'buttons' => [
                [ 
                    'icon' => 'edit', 
                    'url' => {router page="order/edit/{$oOrder->getId()}?back={router page='order/search'}"},
                    'text' => 'Редактировать'
                ],
                [ 
                    'icon' => 'trash' ,
                    'mods' => 'danger',
                    'text' => 'Удалить',
                    'classes' => ' js-remove-order-confirm',
                    'url' => {router page="order/remove/{$oOrder->getId()}?back={router page='order/search'}"}
                ]          
            ]
        ]}
        {if !$oUserCurrent->isOrdersTop() and $oOrder->getStatus() == 'publish'}
            {$aItems[] = [
                'buttons' => [
                    {component 'freelancer:market' text="Поднять наверх"}          
                ]
            ]}
        {/if}
        {if $oOrder->getStatus() == 'start'}
            {$aItems[] = [
                'buttons' => [
                    [ 
                        'icon'=>'check',
                        'mods' => 'success',
                        'text' => 'Завершить',
                        'url' => "{router page='order'}{$oOrder->getId()}"
                    ] 
                ]
            ]}
        {/if}
        
    {/if}
{else}
    
{/if}
    
{$aItems[] = [
    'buttons' => [
        [ 
            'mods' => 'primary',
            'text' => 'Подробнее',
            'url' => "{router page='order'}{$oOrder->getId()}"
        ]            
    ]
]}
{component 'actionbar' classes="{$component}" items=$aItems}
