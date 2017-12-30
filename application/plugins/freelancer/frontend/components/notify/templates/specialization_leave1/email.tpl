{**
 * Оповещение о новых заказах
 *}
{component_define_params params=[ 'oTarget'  ,'oUserCurrent', 'oUserTo' ]}

{capture 'content'}
    Здравствуйте {$oUserTo->getProfileName()}!<br>
    У вас истек срок пользования правами на дополнительные специализации.<br>
    Вам оставлена одна специализация {$oTarget->getTitle()}
{/capture}

{component 'freelancer:email' 
    sTitle="Новые заказы на сайте"
    content=$smarty.capture.content }
