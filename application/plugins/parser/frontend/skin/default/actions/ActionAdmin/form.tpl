<h1>Добавить пользователя</h1>

<form method="POST">
    {component 'field.text' name="inviter" label="Кто пригласил(логин)" value=""}
    {component 'field.text' name="name" label="Имя" value="{$aUserData['name']|trim}"}
    {component 'field.textarea' name="text" label="Текст" value="{$aUserData['text']|trim}"}
    {foreach $aUserData['phones'] as $kp=>$sPhone}
        {component 'field.text' name="phones[]" label="Телефон{$kp}" value="{$sPhone|trim}"}
    {/foreach}
    подсказка: <b>{$aUserData['category']}</b>
    {insert name='block' block='fieldCategory' params=[  'entity' => 'ModuleUser_EntityUser' ]}
    подсказка: <b>{$aUserData['geo']}</b>
    {hook run="freelancer_search_form" assign='contentReturn' target = $oUserCurrent}
    {$contentReturn}
    {foreach $aUserData['imgs'] as $img}
        {component 'field.hidden' value=$img name="imgs[]"}
        <img width="50" src="{$img}"/>
    {/foreach}<br>
    {component 'button' text="Отправить"}
</form>