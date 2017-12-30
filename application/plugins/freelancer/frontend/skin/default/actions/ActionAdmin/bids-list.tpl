{**
 * Добавление о себе
 *
 *}
<h1>Отклики</h1>
{component 'button' template='toolbar' groups=[
    [
        'buttons' => [
            [ 'icon' => 'bell-o', 'text' => 'Новые', 
'url' => {router page='admin/plugin/freelancer/bids/new'} ],
            [ 'icon' => 'check' , 'text' => 'Проверенные', 
'url' => {router page='admin/plugin/freelancer/bids/publish'}],
            [ 'icon' => 'remove', 'text' => 'Удаленные', 
'url' => {router page='admin/plugin/freelancer/bids/deleted'} ]
            
        ]
    ]
]}

    {component "freelancer:admin-bid.list" aBids=$aBids}
    
