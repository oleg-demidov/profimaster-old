{$component = 'robokassa-payment'}
{component_define_params params=[ 'oPayment' ]}


{$oUser = $oPayment->getUser()}
{capture 'footer'}
    {if !$oPayment->getState()}
        {component 'button' text="Оплатить" mods="success" url={router page="robopay/payment/{$oPayment->getId()}"}}
    {else}
        {component 'button.group' buttons=[ 
            [ 'text'=>'Прейти на главную', 'url'=>Router::GetPathRootWeb()],
            [ 'text'=>'Прейти в мой профиль', 'url'=>{($oUser)?$oUser->getUserWebPath():""}]
        ]}
    {/if}
{/capture}


{component 'block' 
    title="Счет"
    footer=$smarty.capture.footer
    classes="{$component}" mods={($oPayment->getState())?"success":"warning"}
    content={component 'info-list' list=[
        [ 'label' => 'Номер счета:', 'content' => {$oPayment->getId()} ],
        [ 'label' => 'Создатель:', 'content' => {component 'freelancer:user.small' oUser=$oUser} ],
        [ 'label' => 'Описание:', 'content' => {$oPayment->getComm()} ],
        [ 'label' => 'Количество дней:', 'content' => {$oPayment->getExpiration()} ],
        [ 'label' => 'Сумма:', 'content' => {component 'text' text="<b>{$oPayment->getSumm()}</b> тг."} ],
        [ 'label' => 'Время создания:', 'content' => {$oPayment->getDate()} ],
        [ 'label' => 'Статус:', 'content' => {($oPayment->getState())?"Оплачен {component 'icon' icon='check'}":"Не оплачен"} ],    
        [ 'label' => 'Время оплаты:', 'content' => {$oPayment->getDatePay()} ]
    ]}}

    