
{$component = 'fl-register-master-activation'}
{component_define_params params=[ 'oUser']}

<p class="activation_text">{lang name='plugin.freelancer.text.activation' email=$sEmail}</p>

{component 'details'
    classes = 'js-activation-details'
    title   = 'Я не получил письмо'
    content = "<p>Попробуйте отправить повторно</p>{component 'auth' template='reactivation'}"}
