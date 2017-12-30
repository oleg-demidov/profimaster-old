
{$component = 'fl-register-master'}
{component_define_params params=[ 'oUser']}

<form method="POST">
{insert name="block" block="specialization" 
        params=[ 
        'plugin' => 'freelancer',
        'label_name' => {lang name='plugin.freelancer.text.specialization'}, 
        'entity' => 'ModuleUser_EntityUser',
        'form_field' => 'specialization' ]}
{component 'button' type='submit' text="Далее" mods="primary large"}
</form>