
{component_define_params params=[ 'oBid' ]}

{component 'button.group' buttons=[
                [ 'text' => 'Редактировать','icon'=>'edit', 'type' => "button", 'mods' => 'primary',
                   'classes' => 'js-bid-form-toggle', 
                    'attributes' => ['data-id' => {$oBid->getId()}, 'data-lsmodaltoggle-modal' => "bid-form-modal{$oBid->getId()}"]],
                [ 'text' => 'Удалить','icon'=>'close', 'type' => "button", 'mods' => 'danger',
                    'classes' => 'js-confirm-remove-modal-toggle',
                    'attributes' => ['data-id' => {$oBid->getId()}, 'data-lsmodaltoggle-modal' => 'bid-remove-modal'] ]
            ]}
{component 'modal'
    title="Вы действительно хотите удалить"
    content=$oBid->getTextCrop(10)
    id='bid-remove-modal'
    classes='js-confirm-remove-modal'
    primaryButton=[ 'text' => 'Удалить', 'type' => "button", 'mods' => 'danger',
        'classes' => 'js-remove-button',
        'attributes' => ['data-id' => {$oBid->getId()}, 'data-lsmodaltoggle-modal' => 'bid-remove-modal'] ]
    }

{component 'block' content={component 'freelancer:bid.form' oBid=$oBid} classes="bid-form-hide"}
    