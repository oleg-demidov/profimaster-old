{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    {component "robokassa:payment" oPayment=$oPayment}
{/block}