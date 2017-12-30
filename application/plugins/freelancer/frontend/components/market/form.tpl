{$component = 'fl-market-form'}
{component_define_params params=[ 'oRole', 'iCount', 'iPrice' ]}

<form class="{$component}" >
    {component 'freelancer:market.pay' text="Показать все привилегии" sTargetType="market" icon="chevron-left"}
    <table>
        <tr>
            <td>Название привилегии:</td>
            <td><b>{$oRole->getTitle()}</b></td>            
        </tr>
        <tr>
            <td>Колличество дней:</td>
            <td>{component 'freelancer:field.count' value=$iCount name="count-days"}</td>            
        </tr>
        <tr>
            <td>Цена:</td>
            <td><b class="{$component}-price">{$iPrice}</b> {Config::Get('plugin.freelancer.market.str_currency')}</td>            
        </tr>
        <tr>
            <td colspan='2'><center><em>Чем больше дней, тем больше скидка</em></center></td>            
        </tr>
        <tr>
            <td></td>
            <td>{component 'button' text="Продолжить" mods="success"}</td>            
        </tr>
    </table>
    {component 'field.hidden' name="price" value=$iPrice}
    {component 'field.hidden' name="role-price" value=$oRole->getPrice()}
    {component 'field.hidden' name="role-id" value=$oRole->getId()}
</form>
    