<form method="POST" class="js-freelancer-form-validate">
    <div class="center_form">
    {component 'button' template='group' label="Выберете вашу роль" buttons=[
        [ 'text' => 'Мастер', 
            'mods' => "large {if $sRole == 'master'}primary{/if}", 
            'url' => {router page="fauth/register/master"} ],
        [ 'text' => 'Заказщик', 
            'mods' => "large {if $sRole == 'employer'}primary{/if}", 
            'url' => {router page="fauth/register/employer"}]
        
    ]}
    </div>
    <div class="choose_form">
        <div class="fields_register">
            {component 'field.text' 
            label="Имя" 
            value={$sName} 
            name="login"
            rules  = [ 'required' => true, 'minlength' => '3', 'remote' => "{router page='auth'}ajax-validate-login" ]}
            
            {component 'field.text' label="Email или Номер" value={$sEmailOrNumber} name="email_or_number"
            rules  = [ 'required' => true, 'trigger' => 'input' ]}
            
            {component 'field.text' label="Пароль" 
            type="password" 
            value={$sPass} 
            name="password"
            rules= [ 'required' => true, 'minlength' => '5', 'trigger' => 'input' ]
            inputClasses = 'js-input-password-reg'}
            
            {component 'field' template='captcha'
            captchaType = Config::Get('sys.captcha.type')
            captchaName = 'user_signup'
            name        = 'captcha'
            label       = $aLang.auth.labels.captcha}
        </div>
        <div class="social_register">
            <div>
             {hook run='freelancer_form_registration_begin'}
             </div>
        </div>
    </div>
    
    {component 'button' text="Зарегистрироваться" mods="large primary"}
</form>