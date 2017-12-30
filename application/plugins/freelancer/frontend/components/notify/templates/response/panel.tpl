{$component = 'fl-notify-panel-order'}
{component_define_params params=[ 'oTarget' ,'oUserCurrent']}
Пользователь: <a href="{router page="user"}{$oUserCurrent->getId()}">{$oUserCurrent->getProfileName()}</a> оставил Ва отзыв. 
<a href="{router page ="user/{$oTarget->getTargetId()}/responses"}">Посмотреть</a>
