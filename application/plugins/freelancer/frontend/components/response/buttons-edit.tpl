{$component = "fl-response-buttons-edit"}
{component_define_params params=[ 'oResponse', 'back' ]}
{$aButs = [
    [ 'text' => 'Редактировать', 'type' => "button", 'mods' => 'primary',
        'icon' => 'edit', 
        'url' => {{router page="freelancer/response/edit"}|cat:$oResponse->getId()}],
    [ 'text' => 'Удалить', 'type' => "button", 'mods' => 'danger',
        'icon' => 'trash-o',
        'classes' => 'js-response-remove-button-toggle',
        'attributes' => ['data-id' => {$oResponse->getId()}, 
        'data-lsmodaltoggle-modal' => "response-remove-modal{$oResponse->getId()}"] ]]}  
{component 'button.group' buttons=$aButs}
{component 'modal'
    title="Вы действительно хотите удалить отклик"
    content=$oResponse->getText()
    id="response-remove-modal{$oResponse->getId()}"
    classes='js-confirm-response-remove'
    primaryButton=[ 'text' => 'Удалить', 'type' => "button",'icon' => 'trash-o', 'mods' => 'danger',
        'url' => {router page="freelancer/response/remove/{$oResponse->getId()}?back={$back}"} ]
    }