

{$component = 'fl-manager-payments'}
{component_define_params params=[ 'aPayments']}

<table class="ls-table {$component}">
        <tr>
            <th>
                Пользователь
            </th>
            <th>
             Дата
            </th>
            <th>
            Сумма
            </th>   
            <th>
            Ваш доход
            </th>
        </tr>
        
{foreach $aPayments as $oPayment}
    {$oUser = $oPayment->getUser()}
    <tr>
        <td>
            {component 'freelancer:user.small' 
            oUser=$oUser
            attributes=['title' =>"Дата регистрации {$oUser->getDateRegister()}" ]}
        </td>
        <td>
            {$oPayment->getDatePay()}
        </td>
        <td>
            {$oPayment->getSumm()} {Config::Get('plugin.freelancer.market.str_currency')}
        </td> 
        <td>
            {$oUser->getManagerProfit($oPayment->getSumm())} {Config::Get('plugin.freelancer.market.str_currency')}
        </td>
    </tr>
{/foreach}

</table>

{component 'pagination' 
    total=+$paging.iCountPage 
    current=+$paging.iCurrentPage 
    url="{$paging.sBaseUrl}/page__page__/{$paging.sGetParams}" 
    classes='js-pagination-invites'}