{**
 * Список пользователей с элементами управления / Пользователь
 *
 * @param object  $user
 * @param string  $selectable
 * @param string  $showActions
 * @param string  $showRemove
 *
 * @param string $classes
 * @param array  $attributes
 * @param array  $mods
 *}

{$component = 'fl-user-action-buttons'}
{component_define_params params=[ 'oUser', 'sCurrentPage']}

<div class="{$component}">
{capture 'actions'}
    
    {if $oUserCurrent and $oUserCurrent->isEmployer() and $oUser->isMaster()}
        {component 'button.group' buttons = [
            [
            'text'=>'Предложить заказ',
            'classes' =>"{$component}-but-order",
            'icon'=>'cart-plus',  
            'mods' => "success large",
            'url' => {router page="order/add/?master_id={$oUser->getId()}"} 
            ]
        ]} 
    {/if}
    {component 'button.group' buttons = [
        [
        'text'=>'Написать сообщение',
        'classes' =>"{$component}-but-mess",
        'icon'=>'envelope',  
        'mods' => "large",
        'url' => {router page="talk/add/?talk_recepient_id={$oUser->getId()}"} 
        ]
    ]}
    {$sNumber = $oUser->getNumberCrop()}
    {if $sNumber}
        {$isAllowContact = ($oUserCurrent and !$oUserCurrent->isViewEmployerContacts() and $oUser->isEmployer())}
        {component 'button.group' buttons = [
            [
            'text'=>$sNumber,
            'classes' =>"{$component}-but-phone {if !$isAllowContact}js-fl-market-modal-toggle{/if}",
            'icon'=>'phone',  
            'mods' => "large",
            'type'=>'button',
            'attributes'=>['data-param-i-user-id' => $oUser->getId()]
            ]
        ]}
        {if $isAllowContact}{component 'freelancer:market.tool' text="Показать контакты" mods="large"}{/if}
    {/if}
{/capture}
{if !($oUserCurrent and $oUser->getId()== $oUserCurrent->getId())}
    {$smarty.capture.actions}
{/if}
</div>