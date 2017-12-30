{if !$oTarget}
    {if $user}
        {$oTarget = $user}
    {/if}
    {if $oOrder}
        {$oTarget = $oOrder}
    {/if}
{/if}
{insert name="block" block="Geo" 
params=[ 'plugin'=>'ydirect', 'target' => $oTarget, 'entity' => 'ModuleUser_EntityUser']}