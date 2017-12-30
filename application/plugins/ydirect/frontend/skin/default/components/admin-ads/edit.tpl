{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{component_define_params params=[ 'oAds' ]}

<form method="post">
{component "field.text" name="title" value={$oAds->getTitle()} label="Заголовок"}
{component "field.textarea" name="text" value={$oAds->getText()} label="Текст"}
{component "field.checkbox" name="active" checked={$oAds->getActive()} label="Отправить на модерацию"}
{component "button" type="submit" text="Сохранить"}
</form>