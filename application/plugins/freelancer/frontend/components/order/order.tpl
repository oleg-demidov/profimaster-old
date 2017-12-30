{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{$component = 'fl-order'}
{component_define_params params=[ 'oOrder' ]}

{capture 'order_content'}    




{capture name='order_specializations'}
    {$aSpecializations = $oOrder->category->getCategories()}
    {if !$aSpecializations|@sizeof}
        Не выбрана
    {/if}
    {foreach $aSpecializations as $oSpec}
        <a href="{router page='order/search/?specialization[]={$oSpec->getId()}'}">
        {$sTitleSpec = ($oSpec->getDescription())?$oSpec->getDescription():$oSpec->getTitle()}{$sTitleSpec}</a><br>
    {/foreach} 
{/capture}

{capture 'order_geo'}
    {$aGeos = $oOrder->ygeo->getGeos()}
    {$zpt = 0}
    {foreach $aGeos as $oGeo}
        {if $zpt},{/if}
        <a href='{router page="order/search/?ygeo={$oGeo->getId()}" }'>{$oGeo->getGeoRegionName()}</a>
        {$zpt = 1}
    {/foreach}
{/capture}

{capture 'master'}
    {$oMaster = $oOrder->getMaster()}
    {if $oMaster}
        <div class="ls-grid-row">
            <div class="ls-grid-col ls-grid-col-6">
                {component 'freelancer:user' template='middle' oUser=$oMaster }                
            </div>
            <div class="ls-grid-col ls-grid-col-6">
                {if $oOrder->_isAllowEdit() and !($oOrder->getStatus() == 'end' or $oOrder->getStatus() == 'start')}
                    {component "button"  
                        classes="fl-cancel-master" 
                        mods="danger" 
                        text="Отменить" 
                        url={router page="order/{$oOrder->getId()}/cancel_master"}}
                {/if}
                {if $oUserCurrent and $oMaster->getId() == $oUserCurrent->getId() and $oOrder->getStatus() == 'master_wait'}
                    {component "button"  
                        classes="fl-accept-master js-accept-master-confirm" 
                        mods="success" 
                        text="Принять заказ" 
                        url={router page="order/{$oOrder->getId()}/accept_master"}}
                {/if}
            </div>
        </div>
    {else}
        {$aLang.plugin.freelancer.text.order.no_master}
    {/if}
{/capture}  
    
{component 'info-list' classes="{$component}-spec" list=[
    [ 'label' => "{component 'icon' icon='map-marker'} Местоположение:", 'content' => $smarty.capture.order_geo ],
    [ 'label' => "{component 'icon' icon='plus'} Добавлено:", 'content' => $oOrder->getDateCreate() ],
    [ 'label' => "{component 'icon' icon='list'} Спецализация:", 'content' => $smarty.capture.order_specializations ],
    [ 'label' => "{component 'icon' icon='eye'} Просмотров:", 'content' => $oOrder->getViewCount() ]
]}

{$aMedia = $oOrder->media->getMedia()}
{if {$aMedia|sizeof}}
    {$aItemsMedia = []}
    {foreach $aMedia as $oMedia}
        <a href="{$oMedia->getFileWebPath()}" class="js-order-works-lightbox">
            <img src='{$oMedia->getFileWebPath("100x")}'>
        </a>
        
    {/foreach}
{/if}

{component 'text' classes="{$component}-text" text=$oOrder->getTextAbout()}

{/capture}

<div class=" ls-grid-row {$component}-title">
    <div class=" ls-grid-col ls-grid-col-6"><h1>{$oOrder->getTitle()} {component 'freelancer:order.status' oOrder=$oOrder}</h1></div>
    <div class="{$component}-title-budjet ls-grid-col ls-grid-col-6">Бюджет: <strong>{$oOrder->getBudjetStr()}</strong></div>
</div>

{$smarty.capture.order_content}

{if $oOrder->_isAllowEdit()}
    {component 'freelancer:order.buttons-edit' oOrder=$oOrder} 
{/if}

{component 'block' title=" {component 'icon' icon='user'} Исполнитель" content=$smarty.capture.master}

{component 'freelancer:bid.list' oOrder=$oOrder}


{$isViewList = $oUserCurrent and ($oUserCurrent->isViewBids() or $oOrder->getUserId() == $oUserCurrent->getId())}

{if $oUserCurrent}
    {if  $oUserCurrent->isCreateBid()}
        {if $oOrder->isCanBid($oUserCurrent)}
            {component  'block' 
            attributes=['id' => 'form-bid']
            title="Оставить отклик"
            classes="fl-form-order-bid" 
            content={component 'freelancer:bid.form' oOrder=$oOrder attributes=['action'=>{router page="order/bid/add"}]}}
        {/if}
    {else}
        {if $oUserCurrent->isMaster()}
        <br>{component 'freelancer:market' text="Оставить отклик"}
        {/if}
    {/if}
{/if}