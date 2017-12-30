{$component = "fl-master-actionbar"}
{component_define_params params=[ 'oMaster' ]}


{*[
    'buttons' => [
        {component 'freelancer:favourite' oTarget=$oMaster classes="js-master-favourite"}
    ]
]*}
{$aItems = []}
{if $oUserCurrent}
    {if $oUserCurrent->isEmployer()}
        {$aItems[] = [
            'buttons' => [
                [ 
                    'icon' => 'envelope-o', 
                    'text' => 'Написать',
                    'url' => "{router page='talk/add'}?talk_recepient_id={$oMaster->getId()}"
                ],
                [ 
                    'icon' => 'file-text', 
                    'mods' => 'success',
                    'text' => 'Предложить заказ',
                    'url' => {router page="order/add/?master_id={$oMaster->getId()}"}
                ]            
            ]
        ]}
    {else}
        {if $oMaster->getId() == $oUserCurrent->getId() and !$oMaster->isMasterTop()}
            {$aItems[] = [
                'buttons' => [
                    {component 'freelancer:market' text="Поднять наверх" sTargetType="role" iTargetId="master_master_top"}          
                ]
            ]}
        {/if}
    {/if}
{else}
    {$aItems[] = [
        'buttons' => [
            [ 
                'icon' => 'envelope-o', 
                'text' => 'Написать',
                'type' => 'button',
                'classes' => 'js-modal-toggle-login'
            ],
            [ 
                'icon' => 'file-text', 
                'mods' => 'success',
                'text' => 'Предложить заказ',
                'type' => 'button',
                'classes' => 'js-modal-toggle-login'
            ]            
        ]
    ]}
    
{/if}
    
{$aItems[] = [
    'buttons' => [
        [ 
            'mods' => 'primary',
            'text' => 'Подробнее',
            'url' => {$oMaster->getUserWebPath()}
        ]            
    ]
]}

{component 'actionbar' classes="{$component}" items=$aItems}
