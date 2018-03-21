
{$component = 'fl-register-master-form'}
{component_define_params params=[ 'oUser']}



<form method="POST" class="{$component}">
    {hook run='registration_begin'}

    {component 'field.text' 
        name="name" 
        label="Ваше имя (ФИО)" 
        rules  = [ 'required' => true, 'minlength' => '3' ]}
    {component 'field.text' 
        name="login" 
        label="Логин" 
        rules  = [ 'required' => true, 'minlength' => '3', 'remote' => "{router page='auth'}ajax-validate-login" ]}
    {component 'field.text' 
        name="email_or_number" 
        label="Email или Номер телефона" 
        rules  = [ 
            'required' => true, 
            'minlength' => '3', 
            'remote' => "{router page='freelancer'}ajax-validate-email-or-number" ]}
    {component 'field.text' 
        type="password" 
        name="pass" 
        classes = "pass_field"
        rules  = [ 
            'required' => true, 'minlength' => '5']
        label="Придумайте пароль"}
    {component 'field.captcha-recaptcha' classes="fl-reg-recaptcha"}
    {component 'field.checkbox' 
        classes = "{$component}-polz"
        rules  = ['required' => true]
        label=" Принять <a class='js-polz-modal-toggle' data-lsmodaltoggle-modal = 'polz-modal' href='{router page='info/oferta'}'>пользовательское соглашение</a>" 
        name="offer"}
    {component 'modal'
        title='Пользовательское соглашение'
        content='Lorem ipsum...'
        id='polz-modal'
        classes='js-polz-modal'}
    {component 'button' type='submit' text="Продолжить" mods="primary large"}
</form>