{$component = 'fl-market-action'}
{component_define_params params=['oAction', 'oUser', 'isActive' ]}

{capture 'footer'}
    {if !$isActive}
        {component 'freelancer:market.pay' 
            text="Активировать"
            sTargetType="action/active" 
            iTargetId=$oAction->getId()
            mods="success"}
    {else}
        {component 'button' type="button" isDisabled=1 text="Активировано"}
    {/if}
{/capture}


{component 'block' 
    title="Акция!"
    footer=$smarty.capture.footer
    classes="success"
    content={component 'info-list' list=[
        [ 'label' => 'Создатель:', 'content' => {component 'freelancer:user.small' oUser=$oUser} ],
        [ 'label' => 'Описание:', 'content' => {$oAction->getDesc()} ],
        [ 'label' => 'Количество дней:', 'content' => {$oAction->getPeriod()} ],
        [ 'label' => 'Сумма:', 'content' => {component 'text' text="<b>0</b> тг."} ],
        [ 'label' => 'Статус:', 'content' => ($isActive)?"Активировано":"Не активировано" ]    
    ]}}