
{$component = 'fl-register-master'}
{component_define_params params=[ 'oUser']}

{if $sEmail}
    {component "freelancer:register.activation"}
{/if}

{if $sNumber}
    {component "freelancer:register.sms"}
{/if}
