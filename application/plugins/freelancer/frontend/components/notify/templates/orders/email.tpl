{**
 * Оповещение о новых заказах
 *}
{component_define_params params=[ 'oTarget'  ,'oUserCurrent' ]}

{capture 'content'}
    {component 'freelancer:notify.email.order.list' aOrders=$oTarget}
{/capture}

{component 'freelancer:email' 
    sTitle="Новые заказы на сайте"
    content=$smarty.capture.content }
