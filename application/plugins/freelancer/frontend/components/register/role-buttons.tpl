{$component = 'fl-register-role'}
{component_define_params params=[ 'role']}

{component 'block' 
    classes="{$component}" 
    title="Выберете вашу роль"
    content={component 'actionbar'  items=[
                [
                    'buttons' => [
                        [ 'text' => $aLang.plugin.freelancer.register.form.im_master, 
                            'url' => {router 'fauth/register_master/step1'},
                            'mods' => 'large success' ]
                    ]
                ],
                [
                    'buttons' => [
                        [ 'text' => $aLang.plugin.freelancer.register.form.im_employer, 
                            'url' => {router 'fauth/register_employer/step1'},
                            'mods' => 'large warning' ]
                    ]
                ]
            ]}
            }
    
{*component 'field.hidden' name="role" value={$role|default:"master"}*}