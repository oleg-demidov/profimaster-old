
{$component = 'fl-smsform'}
{component_define_params params=[ 'oUser']}

<form method="POST" class="{$component}">
    <p>{lang name='plugin.freelancer.text.sms_form' number=$sNumber}</p>
    
    {component 'button' type='button' classes="{$component}-send" text="Получить смс" mods="warning"}<br><br>
    
    {component 'button' template='group' buttons=[
        {component 'field.text' name="kod" classes="{$component}-kod" },
        [ 'text' => 'Подтвердить', 'mods'=>"success", "classes" => "{$component}-submit", 'type'=>'button']
    ]}

    {component 'field.hidden' value=$sNumber name="number"}

</form>