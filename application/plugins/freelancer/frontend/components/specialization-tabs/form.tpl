{$component = 'fl-index-search-form'}
{component_define_params params=['action','title' ]}

{capture name="search_form"}
    <form  method="GET" action="{$action}" > 
    {*Специализация*}
    {insert name="block" block="specialization" 
        params=[ 
        'plugin' => 'freelancer',
        'label_name' => {lang name='plugin.freelancer.text.specialization'}, 
        'entity' => "User",
        'form_field' => 'specialization' ]}
        <div id="action_search">
    
    {component 'button' classes="{$component}-but-submit" text="Далее" mods="primary large"}
 </form>      
{/capture}

{$smarty.capture.search_form}

{*component 'block' 
    classes = "{$component}"
    title=$title
    content=$smarty.capture.search_form
    *}