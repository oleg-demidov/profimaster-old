{$component = 'fl-action-form'}
{component_define_params params=[ 'oAction' ]}

<form class="{$component}" method="POST" >
    {component 'field.text' name="action[title]" label="Название" value=$oAction->getTitle()}
    {component 'field.textarea' name="action[desc]" label="Описание" value=$oAction->getDesc()}
    {component 'field.select' name="action[role_id]" items=$aRoles label="Роль" selectedValue = $oAction->getRoleId()}
    {component 'field.text' name="action[period]" label="Колличество дней" value=$oAction->getPeriod()}
    {component 'field.date' inputClasses="js-action-datepicker" name="action[date_start]" label="Начало акции" value=$oAction->getDateStartFormat()}
    {component 'field.date' inputClasses="js-action-datepicker" name="action[date_end]" label="Конец акции" value=$oAction->getDateEndFormat()}
    {component 'field.checkbox' name="action[state]" label="Активна" checked=$oAction->getState()}
    {component 'button' text="Сохранить" mods="success"}
</form>
    