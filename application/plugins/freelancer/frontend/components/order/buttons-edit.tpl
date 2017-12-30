{$component = "fl-order-edit"}
{component_define_params params=[ 'oOrder' ]}

{$aButs = [
    [ 'text' => 'Редактировать', 'type' => "button", 'mods' => 'primary',
        'icon' => 'edit', 
        'url' => {{router page="order/edit"}|cat:$oOrder->getId()}],
    [ 'text' => 'Удалить', 'type' => "button", 'mods' => 'danger',
        'icon' => 'trash-o',
        'classes' => 'js-order-remove-button-toggle',
        'attributes' => ['data-id' => {$oOrder->getId()}, 
        'data-lsmodaltoggle-modal' => "order-remove-modal{$oOrder->getId()}"] ]]}
        
{$oMaster = $oOrder->getMaster()}
{if $oMaster and $oOrder->getStatus() == 'start'}
    {$aButs[] = [
        'icon'=>'check',
        'url'=>{$oOrder->_getUrlEdit()}, 
        'mods'=>"success", 
        'text'=>"Завершить",
        'classes' => 'js-order-confirm-end-toggle',
        'attributes' => ['data-id' => {$oOrder->getId()}, 
        'data-lsmodaltoggle-modal' => "{$component}-modal-end{$oOrder->getId()}"]]}
{/if}  

{component 'button.group' classes=$component buttons=$aButs}

{component 'modal'
    title="Вы действительно хотите удалить заказ"
    content=$oOrder->getTitle()
    id="order-remove-modal{$oOrder->getId()}"
    classes='js-confirm-remove-order'
    primaryButton=[ 'text' => 'Удалить', 'type' => "button",'icon' => 'trash-o', 'mods' => 'danger',
        'url' => {router page="order/remove/{$oOrder->getId()}?back={Router::GetPathWebCurrent()}"} ]
    }
    
{component 'modal'
    title="Вы действительно хотите завершить заказ"
    content="<h2>{$oOrder->getTitle()}</h2><p>Заказ выполнен и будет остановлен. Вам будет предложено оставить отзыв исполнителю.</p>"
    id="{$component}-modal-end{$oOrder->getId()}"
    classes='js-order-confirm-end-modal'
    primaryButton=[ 'text' => 'Завершить', 'type' => "button",'icon' => 'check', 'mods' => 'success',
        'url' => {router page="order/end/{$oOrder->getId()}"} ]
    }