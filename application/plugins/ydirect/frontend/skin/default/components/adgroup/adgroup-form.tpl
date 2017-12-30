{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = "js-adgroup-form"}
{component_define_params params=[ 'oAdGroup' ]}


<h1>Редактировать группу</h1>
<form class="{$component}" method="post">
    {component 'user.list-item' user=$oAdGroup->getUser()}
    {component 'text' text=$oAdGroup->getUser()->getProfileAbout()}
    {component "field.text" name="name" label="Имя" value="{$oAdGroup->getName()}"}
    {component "field.text" name="negative_keywords" label="Негативные слова" value="{$oAdGroup->getNegativeKeywords()}"}
    {component "field.checkbox" name="active" label="Активировать" checked="{$oAdGroup->getActive()}"}
    {component 'ydirect:keywords' aKeywords=$oAdGroup->getKeywords() attributes=['data-param-ad-group-id' => $oAdGroup->getId()] label="Ключевые слова"}    
    {component 'ydirect:admin-ads.list' aAds=$oAdGroup->getAds() attributes=['data-param-ad-group-id' => $oAdGroup->getId()] label="Обьявления"}<br>
    {component "button" type="submit" text="Сохранить"}
</form>



