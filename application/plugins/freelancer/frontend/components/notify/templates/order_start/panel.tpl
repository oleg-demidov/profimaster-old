{$component = 'fl-notify-panel-order'}
{component_define_params params=[ 'oTarget' ,'oUserCurrent']}
Ваш заказ <a href="{router page="order"}{$oTarget->getId()}">{$oTarget->getTitle()}</a> принят к исполнению мастером 
<a href="{router page="user"}{$oUserCurrent->getId()}">{$oUserCurrent->getProfileName()}</a>
