{$component = 'fl-action-item'}
{component_define_params params=[ 'oAction' ]}


{capture name="content"}
    {component 'text' text =$oAction->getDesc()}
    {component 'info-list' list=[
        ['label' => 'Статус', 'content' => $oAction->getState()],
        ['label' => 'Дата начала', 'content' => $oAction->getDateStart()],
        ['label' => 'Дата окончания', 'content' => $oAction->getDateEnd()]
    ]}
{/capture}

{component 'block' 
    title = $oAction->getTitle()
    content = $smarty.capture.content
    footer = {component 'freelancer:action.actionbar' oAction=$oAction}
}
    