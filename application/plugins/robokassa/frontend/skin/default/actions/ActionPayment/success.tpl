
{extends file='layouts/layout.base.tpl'}

{block name='layout_content'}
    <H1>Спасибо за использование Profimaster.kz</H1>
    {component 'robokassa:payment' oPayment=$oPayment}

{/block}