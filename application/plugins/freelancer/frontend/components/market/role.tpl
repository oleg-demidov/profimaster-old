{$component = 'fl-market-role'}
{component_define_params params=['oRole', 'price' ]}

{capture 'content'}
    {if $oRole}
        {$aRolesPay = $oRole->getRolesPay()}
    {/if}
    
    {function name="getPayBut" oRole=0 mods=''}
        {if $oRole}
            {if {$aActions|sizeof} and $aActions[$oRole->getId()] and !$aUserActions[$oRole->getId()]}
                {component 'freelancer:market.pay' 
                    text=$aActions[$oRole->getId()]->getTitle() 
                    sTargetType="action" 
                    iTargetId=$aActions[$oRole->getId()]->getId()
                    mods=$mods}
            {else}
                {component 'freelancer:market.pay' 
                    text="Купить" 
                    sTargetType="role" 
                    iTargetId=$oRole->getId()
                    iCount=30
                    mods=$mods}
            {/if}
        {/if}
    {/function}
    
    <table class="{$component}-table">
        {foreach $aRolesPay as $oRolePay}
            <tr>
                <td>{$oRolePay->getTitle()}</td>                
                <td><b>{$oRolePay->getPrice()}</b> {Config::Get('plugin.freelancer.market.str_currency')}/в день</td>
                <td>{getPayBut oRole=$oRolePay}</td>
            </tr>
        {/foreach}
        <tr>
            <td><b>Все привилегии</b></td>
            <td><b>{$oRole->getPrice()}</b> {Config::Get('plugin.freelancer.market.str_currency')}/в день</td>
            <td>{getPayBut oRole=$oRole mods="success large"}</td>
        </tr>
    </table>
       
{/capture}



    {component 'block' 
        mods="success"
        content=$smarty.capture.content 
        classes="{$component}"}
