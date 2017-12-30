{$component = 'fl-notify-panel-order'}
{component_define_params params=[ 'oTarget' ,'oUserCurrent']}
Пользователь: <a href="{router page="user"}{$oUserCurrent->getId()}">{$oUserCurrent->getProfileName()}</a> оставил для Вас заказ. 
<a href="{router page="order"}{$oTarget->getId()}">Посмотреть</a>
