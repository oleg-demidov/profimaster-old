{foreach from=$aButtonsNames item=but}
    <a style="margin:2px;" href="/oauth/{$but}" title="{$but}" alt="{$but}"><img src="{$sUriPluginSkin}/img/{$but}-{$sSizeButton}.png"/></a> 
{/foreach}