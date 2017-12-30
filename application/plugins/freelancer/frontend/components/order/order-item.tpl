{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-order-item'}
{component_define_params params=[ 'oOrder', 'mods','back' ]}

{*$oOrder|print_r*}
{capture 'title'}
    <a class="{$component}-title" href="{$oOrder->_getUrlView()}">{$oOrder->getTitle()}</a> 
    
    {component 'freelancer:order.status' oOrder=$oOrder}
    <div class="{$component}-budjet">{($oOrder->getBudjet())?$oOrder->getBudjet():'Договорная'}</div>
    
{/capture}

{capture 'content'}
    {component 'text' text=$oOrder->getCropText()}
    <div class="ls-grid-row {$component}-spec-geo">
        <div class="ls-grid-col ls-grid-col-6">
        {capture 'specializations'}
            {$aSpecializations = $oOrder->category->getCategories()}
            {foreach $aSpecializations as $key=>$oSpecialization}
                {$oSpecialization->getTitle()}
                {if $aSpecializations[$key+1]}
                    ,&nbsp;
                {/if}
            {/foreach}
            {if !{$aSpecializations|sizeof}}
                Не выбрано
            {/if}
        {/capture}
        {component 'info-list'
            classes="{$component}-spec"
            list = [['label' => 'Специализация:', 'icon' => 'list', 'content' =>  $smarty.capture.specializations]]}
        </div>
        <div class="ls-grid-col ls-grid-col-6 {$component}-geo">
        {$oGeo = $oOrder->ygeo->getGeo()}    
        {component 'info-list'
            classes="{$component}-geo"
            list = [[
            'label' => 'Местоположение:', 
            'icon' => 'map-marker', 
            'content' =>  "{if $oGeo}{$oGeo->getGeoRegionName()}{else}Не выбрано{/if}"
        ]]}
        </div>
    </div>
{/capture}

{capture 'order_item_content'}
    <div class="order_item_subcontent">
    {$aMedia = $oOrder->media->getMedia()}
    {$aImages = []}
    {foreach $aMedia as $oMedia}
        {$aImages[] = ['src' => $oMedia->getFileWebPath('120x120crop')]}
    {/foreach}
    <div class="{$component}-block-text">
        {component 'slider' classes="js-{$component}-slider {$component}-slider" images=$aImages}
        {component 'text' 
            classes="{$component}-text" 
            text="{$oOrder->getCropText()}"}
    </div>
    
    {capture 'master'}
        {$oMaster = $oOrder->getMaster()}
        {if $oMaster}
            {component 'freelancer:user.small' oUser=$oMaster}
        {else}
            Исполнитель не выбран
        {/if}
    {/capture}
    {component 'info-list' classes="{$component}-info-list" list=[
        [ 'label' => "{component 'icon' icon='map-marker'} Местоположение:", 'content' => $smarty.capture.order_geo ],
        [ 'label' => "{component 'icon' icon='list'} Спецализация:", 'content' => $smarty.capture.order_specializations ],
        [ 'label' => "{component 'icon' icon='plus'} Добавлено:", 'content' => $oOrder->getDateCreate() ],        
        [ 'label' => "{component 'icon' icon='comments-o'} Откликов:", 'content' => $oOrder->getCountBids() ],
        [ 'label' => "{component 'icon' icon='address-card-o'} Исполнитель:", 'content' => $smarty.capture.master ]
          
    ]}
    </div>
    
{/capture}

{capture 'footer'}
    
    {component 'freelancer:order.actionbar' oOrder=$oOrder}
    
    <div class="{$component}-employer">{component 'freelancer:user.small' oUser=$oOrder->getUser()}</div>
    
    {if $oUserCurrent and $oUserCurrent->isAdministrator()}
        {component 'button' classes="button_bid_list" template='toolbar' groups=[
            [
                'buttons' => [
                    [ 
                        'icon' => 'check', 
                        'mods' => 'success',
                        'classes' => "js-order-ajax-allow", 
                        'text' => 'Подтвердить',
                        'attributes' => [
                            'order_id' => {$oOrder->getId()}
                        ] 
                    ],
                    [ 
                        'icon' => 'remove' ,
                        'mods' => 'danger',
                        'classes' => "js-order-ajax-remove", 
                        'text' => 'Удалить',
                        'attributes' => [
                            'order_id' => {$oOrder->getId()}
                        ]
                    ]
                ]
            ]
        ]}
    {/if}
    
{/capture}


{component 'block' 
    mods=$mods
    attributes=['event'=>{$oOrder->getStatus()}] 
    classes="{cmods name=$component mods=$mods} {$component} fl-admin-order"
    title=$smarty.capture.title
    footer=$smarty.capture.footer
    content=$smarty.capture.content
}
