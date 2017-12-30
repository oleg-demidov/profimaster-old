{$component = 'bid-list'}

{component_define_params params=[ 'oOrder' ]}

{$oOrderCreator = $oOrder->getUser()}



<div class="freelancer-bids-items">
{$iCount = $oOrder->getCountBids()}
{component 'block' content="Откликов: {$iCount}"}

{if $oUserCurrent}
    {if $oOrder->isCreator( $oUserCurrent )  }
       {$aBids = $oOrder->getBids()} 
    {else}
        {if $oUserCurrent->isViewBids()}
            {$aBids = $oOrder->getBids()} 
        {else}
            {if $iCount>1}{component 'freelancer:market' text="Показать все отклики"}{/if}
            {$aBids = $oOrder->getBids(['user_id' => $oUserCurrent->getId()])} 
        {/if}
    {/if}
{/if}

{foreach $aBids as $oBid}
    {component 'freelancer:bid.item' oBid=$oBid oOrderCreator=$oOrderCreator isMasterChoosen=0 }
{/foreach}
</div>