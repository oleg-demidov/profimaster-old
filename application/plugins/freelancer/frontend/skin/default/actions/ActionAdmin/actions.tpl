
<h1>Акции</h1>
{component 'button' text="Добавить" url="{router page='admin/plugin/freelancer/actions/edit'}"}

{component 'freelancer:action.items' aActions=$aActions aPaging=$aPaging}
