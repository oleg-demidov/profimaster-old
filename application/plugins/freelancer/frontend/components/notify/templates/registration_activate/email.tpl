{**
 * Оповещение о новых заказах
 *}
{component_define_params params=[ 'oTarget'  ,'oUserCurrent' ]}

{capture 'content'}
    {lang name='emails.registration_activate.text' params=[
        'website_url'    => Router::GetPath('/'),
        'website_name'   => Config::Get('view.name'),
        'user_name'      => $oTarget->getLogin(),
        'user_password'  => $oTarget->getPassword(),
        'activation_url' => "{router page='auth'}activate/{$oTarget->getActivateKey()}/"
    ]}
{/capture}

{component 'freelancer:email' 
    sTitle="Активация аккаунта"
    content=$smarty.capture.content }
