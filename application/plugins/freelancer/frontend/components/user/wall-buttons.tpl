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

{$component = 'fl-user-wall-buttons'}
{component_define_params params=[ 'oUser', 'sCurrentPage']}

{$aItems=[
    [   
        'name' => 'about', 
        'url' => {router page="user/{$oUser->getLogin()}/about"}, 
        'text' => 'Описание' 
    ],
    [   
        'name' => 'responses', 
        'url' => {router page="user/{$oUser->getLogin()}/responses"}, 
        'text' => 'Отзывы',
        'count' => $oUser->getCountResponsed() 
    ]
]}

{if $oUser->isMaster()}
    {$aItems[] = [ 
        'name' => 'portfolio', 
        'url' => {router page="user/{$oUser->getLogin()}/portfolio"}, 
        'text' => 'Портфолио',
        'count' => $oUser->getCountWorks()
    ]}
{/if}
    
{$aItems[] =[ 
    'name' => 'orders', 
    'url' => {router page="user/{$oUser->getLogin()}/orders"}, 
    'text' => 'Заказы',
    'count' => $oUser->getCountOrders() 
]}
{component 'nav'
    activeItem = $sCurrentPage
    mods = 'pills wall-buttons large'
    items=$aItems}
{*$aButtons = [
    ['text'=>'Отзывы',
    "badge" => ['value' => $oUser->getCountResponsed()],
    'icon'=>'comments-o',  
    'mods' => "{if $sCurrentPage == 'responses'}primary{/if}",
    'url' => {router page="user/{$oUser->getId()}/responses"}]
]}
{$sRole = $oUser->getStrRole()}
{if $sRole == 'employer'}
    {$aButtons[] = ['text'=>'Заказы', 
    "badge" => ['value' => $oUser->getCountOrders()],
    'icon'=>'cart-plus',    
    'mods' => "{if $sCurrentPage == 'orders'}primary{/if}",
    'url' => {router page="user/{$oUser->getId()}/orders"}]}
{/if}
{if $sRole == 'master'}
    {$aButtons[] = ['text'=>'Портфолио',
    "badge" => ['value' => $oUser->getCountWorks()],
    'icon' => 'briefcase', 
    'mods' => "{if $sCurrentPage == 'portfolio'}primary{/if}",
    'url' => {router page="user/{$oUser->getId()}/portfolio"}]}
    {if $oUserCurrent and  $oUserCurrent->getId() == $oUser->getId()}
        {$aButtons[] = ['text'=>"Заказы",
        "badge" => ['value' => $oUser->getCountOrders()],
        'icon'=>'cart-plus', 
        'mods' => "{if $sCurrentPage == 'orders'}primary{/if}",
    'url' => {router page="user/{$oUser->getId()}/orders"}]} 
    {/if}
{/if}

{component 'button.group' classes=$component buttons=$aButtons*}