{$component = 'fl-notify-panel-talk'}
{component_define_params params=[ 'oTarget' ,'oUserCurrent']}
Пользователь: <a href="{router page="user"}{$oUserCurrent->getId()}">{$oUserCurrent->getProfileName()}</a> оставил Вам личное сообщение. 
<a href="{router page="talk/read"}{$oTarget->getId()}">Прочитать</a>
