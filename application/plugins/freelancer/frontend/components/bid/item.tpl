{$component = 'fl-bid-item'}

{component_define_params params=[ 'oBid', 'oOrderCreator', 'isMasterChoosen' ]}
{$oBidCreator = $oBid->getUser()}

{capture 'bid_title'}
    {component 'freelancer:user.middle' oUser=$oBidCreator}
{/capture}

{capture 'bid_content'}
    {component 'text' text=$oBid->getText()}
    {component 'info-list' list=[
        [ 'label' => 'Предложенная цена:', 'content' => {($oBid->getPrice())?$oBid->getPrice():"Договорная"} ]
    ]}
{/capture}

{capture 'bid_footer'}
    {if $oUserCurrent->getId() == $oOrderCreator->getId() and !$isMasterChoosen}
        {component 'freelancer:bid.choose' oUser = $oBidCreator oBid=$oBid}
    {/if}
    {if $oBidCreator->getId() == $oUserCurrent->getId()}
        {component 'freelancer:bid.edit' oBid=$oBid}
    {/if}
{/capture}
{component 'block' 
    classes={$component}
    title=$smarty.capture.bid_title
    content=$smarty.capture.bid_content
        footer={$smarty.capture.bid_footer|trim}}
