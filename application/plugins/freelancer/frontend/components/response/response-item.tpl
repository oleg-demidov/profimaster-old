{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-response-item'}
{component_define_params params=[ 'oResponse', 'mods' ]}

{capture 'title'}
    {component 'freelancer:user.small' oUser=$oResponse->getUser() mods="response"}
    {component 'admin:p-plugin.star-rating' rating=$oResponse->getRaiting()*20 mods="response"}
{/capture}

{capture 'content'}
    {$oOrder = $oResponse->getOrder()}
    {if $oOrder}
        {component 'block' 
        title="Заказ"        
        content={component 'freelancer:order.mini' oOrder=$oOrder}}
    {/if}
    {$aMedia = $oResponse->media->getMedia()}
    {$aImages = []}
    {foreach $aMedia as $oMedia}
        {$aImages[] = ['src' => $oMedia->getFileWebPath('120x120crop')]}
    {/foreach}
    <div class="{$component}-block-text">
        {component 'slider' classes="js-{$component}-slider {$component}-slider" images=$aImages}
        {component 'text' 
            classes="{$component}-text" 
            text="{$oResponse->getText()}"}
    </div>
{/capture}


{capture 'footer'}
    {*if !$oMaster and $oUserCurrent->getId() != $oOrder->getUserId()}
        {component 'button.group' buttons=[[
            'url'=>$oOrder->_getUrlView(),'mods'=>'success','text'=>'Откликнуться'
        ]]}
    {/if}
    
    {if $oUserCurrent and $oUserCurrent->isAdministrator()}
        {component 'button' classes="button_bid_list" template='toolbar' groups=[
            [
                'buttons' => [
                    [ 
                        'icon' => 'edit', 
                        'url' => {router page="order/edit/{$oOrder->getId()}?back={$back}"},
                        'text' => 'Редактировать'
                    ],
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
    {/if*}
    {if $oUserCurrent and $oUserCurrent->getId() == $oResponse->getUserId()}
        {component 'freelancer:response.buttons-edit' oResponse=$oResponse}
    {/if}
    
    {component 'info-list' classes="{$component}-date" list=[
        [ 'label' => "{component 'icon' icon='plus'} Добавлено:", 'content' => $oResponse->getDateCreate() ]        
    ]}
    <div></div>
{/capture}


{component 'block' 
    mods=$mods
    classes="{cmods name=$component mods=$mods} {$component} "
    title=$smarty.capture.title
    content=$smarty.capture.content
    footer=$smarty.capture.footer
}
