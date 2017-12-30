{$component = 'fl-notify-panel-order'}
{component_define_params params=[ 'oTarget' ,'oUserCurrent']}

Новые заказы за сутки: <b>{sizeof($oTarget)}</b> <a href="{router page='order/search'}">Посмотреть</a>. 
