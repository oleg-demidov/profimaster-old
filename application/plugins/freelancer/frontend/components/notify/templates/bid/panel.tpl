{$component = 'fl-notify-panel-order'}
{component_define_params params=[ 'oTarget' ,'oUserCurrent']}
Пользователь <a href="{$oUserCurrent->getUserWebPath()}">{$oUserCurrent->getProfileName()}</a> оставил отклик на ваш заказ. 
<a href="{router page="order"}{$oTarget->getOrder()->getId()}">Посмотреть</a>
