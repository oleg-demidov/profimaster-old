
<form method="post" class="js-freelancer-form-validate">
   
{*capture 'user_info'}
    {component 'user.avatar' classes="user-avatar-freel" user=$oUser}
    {component 'info-list' classes="user-info-list" list=[
        [ 'label' => 'Логин:', 'content' => $oUser->getLogin() ],
        [ 'label' => 'Email:', 'content' => $oUser->getEmail() ],
        [ 'label' => 'Номер:', 'content' => $oUser->getNumber() ]
    ]}
{/capture}    
    
{component 'block' content=$smarty.capture.user_info*}
    
{component 'freelancer:auth.role-buttons'}

{component 'field' template='text'
        name   = 'login'
        value = {$oUser->getLogin()}
        rules  = [ 'required' => true, 'minlength' => '3', 'remote' => "{router page='auth'}ajax-validate-login" ]
        label  = $aLang.auth.labels.login}
        
{component 'button' text="Завершить регистрацию"}
</form>