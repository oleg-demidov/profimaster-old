{$component = 'fl-register-role'}
{component_define_params params=[ 'role']}

{component 'block' classes="{$component}" title="Выберете вашу роль"
    content={component 'button' template='group' label="Выберете вашу роль" buttons=[
        [ 'text' => 'Мастер', 
            'mods' => "{if $role=='master'}primary{/if} large",
            'classes' => 'master-but',
            'type' => 'button',
            'value' => 'master'],
        [ 'text' => 'Заказчик', 
            'mods' => "{if $role=='employer'}primary{/if} large",
            'classes' => 'employer-but',
            'type' => 'button',
            'value' => 'employer']
        
    ]}}
{*component 'field.hidden' name="role" value={$role|default:"master"}*}