{$component = 'fl-action-actionbar'}
{component_define_params params=[ 'oAction' ]}


{component 'actionbar' items=[
    [
        'buttons' => [
            [ 'icon' => 'edit', 'text' => 'Редактировать', 'url' => "{router page='admin/plugin/freelancer/actions/edit'}{$oAction->getId()}" ],
            [ 'icon' => 'trash', 'text' => 'Удалить', 'classes' => 'js-action-delete-confirm', 'url' => "{router page='admin/plugin/freelancer/actions/delete'}{$oAction->getId()}"]
        ]
    ]
]}
    