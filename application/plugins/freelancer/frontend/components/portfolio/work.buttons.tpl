{$component = "fl-portfolio-work-buttons-edit"}
{component_define_params params=[ 'oWork', 'back' ]}
{$aButs = [
    [ 'text' => 'Редактировать', 'type' => "button", 'mods' => 'small primary',
        'icon' => 'edit', 
        'url' => {router page="portfolio/work/edit/{$oWork->getId()}?back={$back}"}],
    [ 'text' => 'Удалить', 'type' => "button", 'mods' => 'small danger',
        'icon' => 'trash-o',
        'classes' => "js-work-remove-button-toggle",
        'attributes' => ['data-id' => {$oWork->getId()}, 
        'data-lsmodaltoggle-modal' => "work-remove-modal{$oWork->getId()}"] ]]}  
{component 'button.group'  buttons=$aButs}
{component 'modal'
    title="Вы действительно хотите удалить"
    content=$oWork->getTitle()
    id="work-remove-modal{$oWork->getId()}"
    classes='js-confirm-work-remove'
    primaryButton=[ 'text' => 'Удалить', 'type' => "button",'icon' => 'trash-o', 'mods' => 'danger',
        'url' => {router page="portfolio/work/remove/{$oWork->getId()}?back={$back}"} ]
    }