{**
 * Оповещение о новом личном заказе
 *}
{component_define_params params=[ 'oTarget'  ,'oUserCurrent' ]}

{capture 'content'}
    {component 'freelancer:notify.email.order.item' oOrder=$oTarget}
    {component 'freelancer:email.button' text="Подробнее" url={router page="order/{$oTarget->getId()}"} }
{/capture}

{component 'freelancer:email' 
    sTitle="Ваш заказ принят на выполнение"
    content=$smarty.capture.content }
 

