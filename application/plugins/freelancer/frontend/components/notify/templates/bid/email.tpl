{**
 * Оповещение о новом сообщении
 *}

{extends 'Component@freelancer:email'}
{block 'content'}
{component_define_params params=[ 'oTarget','oUserCurrent' ]}


{*
    Пользователь <a href="{$oUserCurrent->getUserWebPath()}">{$oUserCurrent->getProfileName()}</a> оставил отклик на ваш заказ,
				посмотреть его можно перейдя по <a href="{router page="order"}{$oTarget->getOrder()->getId()}">этой ссылке</a>
*}
{/block}
