{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{$component = 'fl-order'}
{component_define_params params=[ 'oOrder' ]}
{$oOrderCreator = $oOrder->getUser()}



{capture 'order_title'}
    <div class="{$component}-title">
    <h1>{$oOrder->getTitle()}</h1>
    <div class="{$component}-title-budjet"><span>Бюджет:</span><strong>{$oOrder->getBudjet()}</strong></div>
    </div>
{/capture}


{capture 'order_content'}
    

<div class="{$component}-content-block">
{$aMedia = $oOrder->media->getMedia()}
{if {$aMedia|sizeof}}
    {$aItemsMedia = []}
    {foreach $aMedia as $oMedia}
        {$aItemsMedia[] = [src=>$oMedia->getFileWebPath("200x")]}
        
    {/foreach}
    {component 'slider' classes='js-my-slider' images=$aItemsMedia}
{/if}

</div>
    
<div class="{$component}-content-block">

{capture 'order_specializations'}
    <div style="float:left;">
    {function 'get_parent_geo' oCategory=0}
        {if $oCategory}
            {$oCategoryP = $oCategory->getParent()}
            {get_parent_geo oCategory=$oCategoryP}
            {if $oCategoryP} > {/if}
            <a href={router page="order/search/?specialization[]={$oCategory->getId()}"}>
                {$oCategory->getTitle()}</a>
        {/if}
    {/function}
    {$aSpecializations = $oOrder->category->getCategories()}
    {$zpt = 0}
    {foreach $aSpecializations as $oSpecialization}
        {if $zpt},<br>{/if}
        {get_parent_geo oCategory=$oSpecialization}
        {$zpt = 1}
    {/foreach}
    </div>
{/capture}

{capture 'order_geo'}
    {$aGeos = $oOrder->ygeo->getGeos()}
    {$zpt = 0}
    {foreach $aGeos as $oGeo}
        {if $zpt},{/if}
        <a href={router page="order/search/?ygeo={$oGeo->getId()}" }>{$oGeo->getGeoRegionName()}</a>
        {$zpt = 1}
    {/foreach}
{/capture}

{capture 'master'}
    {$oMaster = $oOrder->getMaster()}
    {if $oMaster}
        {component 'freelancer:user' template='list-small-item' user=$oMaster }
        {if $oOrder->_isAllowEdit()}
            {component "button"  classes="fl-cancel-master" mods="danger xsmall" text="Отменить" url={router page="order/{$oOrder->getId()}/cancel_master"}}
        {/if}
    {else}
        {$aLang.plugin.freelancer.text.order.no_master}
    {/if}
{/capture}


{component 'info-list'  list=[
    [ 'label' => 'Бюджет:', 'content' => "<strong>{$oOrder->getBudjet()}</strong>" ],       
    [ 'label' => "{component 'icon' icon='map-marker'} Местоположение:", 'content' => $smarty.capture.order_geo ],
    [ 'label' => "{component 'icon' icon='list'} Спецализация:", 'content' => $smarty.capture.order_specializations ],
    [ 'label' => "{component 'icon' icon='plus'} Добавлено:", 'content' => $oOrder->getDateCreate() ],
    [ 'label' => "{component 'icon' icon='eye'} {$aLang.plugin.freelancer.text.form.order.status}", 
        'content' => {lang name="plugin.freelancer.text.order.status.{$oOrder->getStatus()}"}, 'mods' => 'success' ],
    [ 'label' => "{component 'icon' icon='address-card-o'} Исполнитель:", 'content' => $smarty.capture.master ]
]}

</div>


<div class="{$component}-content-about">
    <p class="about_text">{$oOrder->getTextAbout()}</p>
</div>
{/capture}

{capture 'order_footer'}
    {if $oOrder->_isAllowEdit()}
        {component 'freelancer:order.buttons-edit' oOrder=$oOrder}        
    {/if}
{/capture}
    
{component 'block' 
    title=$smarty.capture.order_title
    content=$smarty.capture.order_content
    footer=$smarty.capture.order_footer}




{component 'freelancer:bid.list' oOrder=$oOrder oOrderCreator=$oOrderCreator}
{if $oOrder->isCanBid()}
    {component  'block' 
    title="Оставить отклик"
    classes="fl-form-order-bid" 
    content={component 'freelancer:bid.form' oOrder=$oOrder attributes=['action'=>{router page="order/bid/add"}]}}
{/if}