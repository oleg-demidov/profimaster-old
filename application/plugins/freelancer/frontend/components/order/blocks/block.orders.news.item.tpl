{$component = "fl-order-new"}
{component_define_params params=[ 'oOrder' ]}
<div class="{$component}-item">
 <div class="ls-grid-row">   
    <div class="{$component}-title ls-grid-col ls-grid-col-8">
        {if $oOrder->getFire()}
            {component 'icon' icon="fire" classes="{$component}-fire" attributes=['title' => 'Срочно']}
        {/if}
        <a href="{router page='order'}{$oOrder->getId()}">{$oOrder->getTitle()}</a>
    </div>
    <div class="{$component}-budjet ls-grid-col ls-grid-col-4">
        {$oOrder->getBudjet()}
    </div>
</div>
{component 'text' attributes=['style'=>'overflow:hidden;'] text=$oOrder->getCropText(10)}
{$oOrder->getDateCreate()}
</div>