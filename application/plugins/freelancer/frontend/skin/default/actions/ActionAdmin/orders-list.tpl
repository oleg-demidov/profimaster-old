{**
 * Добавление о себе
 *
 *}
<h1>Заказы</h1>
{component 'block' content={component 'button' template='toolbar' groups=[
    [
        'buttons' => [
            [ 'icon' => 'bell-o', 'text' => 'Новые', 'mods' => "{if $sStatus == 'new'}primary{/if}",
'url' => {router page='admin/plugin/freelancer/orders/new'} ],
            [ 'icon' => 'check' , 'text' => 'Проверенные', 'mods' => "{if $sStatus == 'publish'}primary{/if}",
'url' => {router page='admin/plugin/freelancer/orders/publish'}],
            [ 'icon' => 'remove', 'text' => 'Удаленные', 'mods' => "{if $sStatus == 'deleted'}primary{/if}",
'url' => {router page='admin/plugin/freelancer/orders/deleted'} ]
            
        ]
    ]
]}}
    {component "freelancer:order.list" aOrders=$aOrders}
    
