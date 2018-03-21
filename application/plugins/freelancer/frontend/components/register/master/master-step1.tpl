
{$component = 'fl-register-master'}
{component_define_params params=[ 'oUser']}

<form method="POST">
    
{component 'freelancer:category-tabs.checkboxes'  categories=$aCategories name="specialization"}

{component 'button' type='submit' text="Далее" mods="primary large"}
</form>