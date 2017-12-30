{**
 * Оповещение о новом личном заказе
 *}
{component_define_params params=[ 'oTarget'  ,'oUserCurrent' ]}

{capture 'content'}
    {component 'freelancer:notify.email.order.item' oOrder=$oTarget}
    {component 'freelancer:email.button' text="Принять" url={router page="order/{$oTarget->getId()}"} }
{/capture}

{component 'freelancer:email' 
    sTitle="Вас выбрали исполнителем заказа"
    content=$smarty.capture.content }
 

