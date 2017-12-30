{**
 * Оповещение о новом сообщении
 *}

{extends 'Component@email.email'}
{block 'content'}
{component_define_params params=[ 'oTarget','oUserCurrent' ]}


    Вам пришло новое письмо от пользователя <a href="{$oUserCurrent->getUserWebPath()}">{$oUserCurrent->getProfileName()}</a>,
				прочитать его можно перейдя по <a href="{router page="talk/read"}{$oTarget->getId()}">этой ссылке</a>
{/block}
