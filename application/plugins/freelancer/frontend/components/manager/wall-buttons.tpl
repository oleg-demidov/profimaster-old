

{$component = 'fl-user-wall-buttons'}
{component_define_params params=[ 'oUser', 'sCurrentPage']}
{*[   
        'name' => 'responses', 
        'url' => {router page="manager/{$oUser->getLogin()}/responses"}, 
        'text' => 'Отзывы',
        'count' => $oUser->getCountResponsed() 
    ]*}
{$aItems=[
    
]}
{if $oUserCurrent and ($oUserProfile->getId() == $oUserCurrent->getId() or $oUserCurrent->isAdministrator())}
    {$aItems[]=    [   
        'name' => 'invites', 
        'url' => {router page="manager/{$oUser->getLogin()}/invites"}, 
        'text' => 'Приглашения',
        'count' => $iCountInvites
    ]}
    {$aItems[]=   [   
        'name' => 'payments', 
        'url' => {router page="manager/{$oUser->getLogin()}/payments"}, 
        'text' => 'Оплаты',
        'count' => $iPaymentsCount
    ]}
    {$aItems[]=   [   
        'name' => 'transactions', 
        'url' => {router page="manager/{$oUser->getLogin()}/transactions"}, 
        'text' => 'Баланс'
    ]}
{/if}

{component 'nav'
    activeItem = $sCurrentPage
    mods = 'pills wall-buttons large'
    items=$aItems}