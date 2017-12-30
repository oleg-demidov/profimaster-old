{**
 * Оповещение о отзыве
 *}
{component_define_params params=[ 'oTarget'  ,'oUserCurrent' ]}

{capture 'title'}
    Вам оставил отзыв пользователь <a href="{$oUserCurrent->getUserWebPath()}">{($oUserCurrent->getProfileName())?$oUserCurrent->getProfileName():$oUserCurrent->getUserLogin()}</a>
{/capture}

{capture 'content'}
    {component 'freelancer:notify.email.response.item' oResponse=$oTarget}
{/capture}

{component 'freelancer:email' 
    sTitle=$smarty.capture.title
    content=$smarty.capture.content }
 

