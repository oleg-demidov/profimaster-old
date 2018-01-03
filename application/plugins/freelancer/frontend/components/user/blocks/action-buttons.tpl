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

{$oUser = $oUserProfile|default:$oUser}

{capture 'actions'}
    {$aButtons = []}
    
    {if $oUserCurrent}
        {if $oUserCurrent->isEmployer() and $oUser->isMaster()}
            {$aButtons[] = [
                'text'=>'Заказ',
                'classes' =>"{$component}-but-order",
                'icon'=>'cart-plus',  
                'mods' => "success large",
                'type'=>'button',
                'url' => {router page="order/add/?master_id={$oUser->getId()}"} 
            ]} 
        {/if}
    
        {$aButtons[] = [
            'text'=>'Сообщение',
            'classes' =>"{$component}-but-mess",
            'icon'=>'envelope',  
            'mods' => "large",
            'type'=>'button',
            'url' => {router page="talk/add/?talk_recepient_id={$oUser->getId()}"} 
        ]}
    {/if}
    
    {*$sNumber = $oUser->getNumberCrop()}
    {if $sNumber}
        {$isAllowContact = ($oUserCurrent and !$oUserCurrent->isViewEmployerContacts() and $oUser->isEmployer())}
        {$aButtons[] = [
            'text'=>$sNumber,
            'classes' =>"{$component}-but-phone {if !$isAllowContact}js-fl-market-modal-toggle{/if}",
            'icon'=>'phone',  
            'mods' => "large",
            'type'=>'button',
            'attributes'=>['data-param-i-user-id' => $oUser->getId()]
        ]}
        {if $isAllowContact}{component 'freelancer:market.tool' text="Показать контакты" mods="large"}{/if}
    {/if*}
    
    
    {component 'button.group'
        classes="fl-profile-contacts"
        buttonParams=[ 'mods' => 'large' ]
        mods=""
        buttons=$aButtons}
{/capture}
    
{if !($oUserCurrent and $oUser->getId()== $oUserCurrent->getId())}
    {$smarty.capture.actions}
{/if}
