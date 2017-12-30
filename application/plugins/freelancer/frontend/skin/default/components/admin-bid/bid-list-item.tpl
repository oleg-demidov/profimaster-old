{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-admin-bid'}
{component_define_params params=[ 'oBid' , 'classes' ]}
{$status = 'new'}
{if $oBid->getPublish()}
    {$status = 'publish'}
{/if}
{if $oBid->getDelete()}
    {$status = 'deleted'}
{/if}
<div class="{$component} {$classes}" event={$status}>
    {component 'user.list-small-item' user=$oBid->getUser()}
    <p>{$oBid->getText()}</p>
    <div>{$oBid->getDate()}</div>
    
    {component 'button' template='toolbar' groups=[
        [
            'buttons' => [
                [ 
                    'icon' => 'edit', 
                    'url' => {{router page="order/edit"}|cat:'4'},
                    'text' => 'Редактировать'
                ],
                [ 
                    'icon' => 'check', 
                    'classes' => "js-bid-ajax-allow", 
                    'text' => 'Подтвердить',
                    'attributes' => [
                        'bid_id' => {$oBid->getId()}
                    ] 
                ],
                [ 
                    'icon' => 'remove' ,
                    'classes' => "js-bid-ajax-remove", 
                    'text' => 'Удалить',
                    'attributes' => [
                        'bid_id' => {$oBid->getId()}
                    ]
                ]
            ]
        ]
    ]}
</div>