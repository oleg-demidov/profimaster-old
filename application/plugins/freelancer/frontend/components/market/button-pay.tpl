{$component = 'fl-button-pay'}
{component_define_params params=['sTargetType', 'iTargetId', 'iCount' ]}

{$params.url = {router page="pay/{$sTargetType}/{$iTargetId}/{$iCount}"}}

{component 'button' classes="{$component}" params=$params }