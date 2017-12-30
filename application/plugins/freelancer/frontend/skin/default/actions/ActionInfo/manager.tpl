
<h5>Партнерская программа</h5>
<p>Получайте вознаграждение, приглашая новых мастеров на сайт. Привлекайте их, размещая партнерскую ссылку, баннеры и посты в соцсетях. </p>
<p><b>Вознаграждение по партнерской программе составляет 20%</b> с каждой покупки платных услуг мастером (Пример: если мастер купил аккаунт PRO за 5000 тенге, то ваше вознаграждение составляет 1000 тенге). Статистика по вашим приглашенным мастерам и по партнерским отчислениям доступна после авторизации.</p>
<p>Как использовать партнерскую программу:</p>
<ol>
    <li><a href="{router page="user/register_manager/reg"}">Зарегестрироваться на сайте партнером</a> или в любом качестве(роли)</li>
    <li>Перейти в раздел {if $oUserCurrent}<a href="{router page='manager'}{$oUserCurrent->getLogin()}">Моя партнерка</a>{else}Моя партнерка{/if}</li>
    <li>Поделиться ссылкой</li>
</ol>
<br>

{if !$oUserCurrent}
    {component 'button' 
        text='Зарегистрироваться Партнером' 
        url={router page="user/register_manager/reg"} 
        attributes = ['style' => 'text-decoration:none;']
        mods="large success"}
{else}
    {component 'freelancer:manager.invite-but' oUser=$oUserCurrent}
{/if}