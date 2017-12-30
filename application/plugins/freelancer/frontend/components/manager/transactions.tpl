

{$component = 'fl-manager-transactions'}
{component_define_params params=[ 'aTransactions']}


{function 'get_icon_type' type='profit'}
    {$aIcons = [
        'profit' => 'plus',
        'loss' => 'minus'
    ]}
    {component 'icon' icon={$aIcons[$type]}}
{/function}

<table class="ls-table {$component}">
        <tr>
            <th>
            Тип
            </th>
            <th>
            Описание
            </th>
            <th>
             Дата
            </th>
            <th>
            Сумма
            </th>   
            
        </tr>
        
{foreach $aTransactions as $oTransaction}
    
    <tr>
        <td>
            {get_icon_type type={$oTransaction->getType()}}
        </td>
        <td>
            {$oTransaction->getDesc()}
        </td>
        <td>
            {$oTransaction->getDateCreate()}
        </td>
        <td>
            <b>{$oTransaction->getSumm()}</b> {Config::Get('plugin.freelancer.market.str_currency')}
        </td> 
        
    </tr>
{/foreach}

</table>

{component 'pagination' 
    total=+$paging.iCountPage 
    current=+$paging.iCurrentPage 
    url="{$paging.sBaseUrl}/page__page__/{$paging.sGetParams}" 
    classes='js-pagination-transactions'}