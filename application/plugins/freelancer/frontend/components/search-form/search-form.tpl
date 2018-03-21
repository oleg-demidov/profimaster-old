{$component = 'fl-search-form'}
{component_define_params params=['sEntity', 'geoLabel', 'aSpecializations' ]}

{capture name="search_form" }
    <form  method="GET" class="{$component}" action="{router page="masters"}" > 
        {component "field.hidden" name="form" value="1"}
        
        {component 'freelancer:field.query'
            classes="js-query-input"
            name="query"
            label="Поиск совпадения"}
            
        {component 'ymaps:fields.ajaxgeo' 
            classes="js-search-form-geo"
            label=$geoLabel 
            place=$oGeoTarget
            choosenGeo     = $oGeo} 
            
        {component 'freelancer:field.category-tree' 
            url = {router page="masters"}
            categoriesSelected = $specializationSelected
            aCategories=$aSpecializations 
            label="Специализация"} 
        
    </form>      
{/capture}
    
{capture name="search_form_footer"}
    {component 'button' classes="{$component}-but-submit" text="Найти" mods="primary"}
    <span class="search-results-count">{lang name="plugin.freelancer.search_form.count"}: <b>{$iMastersCount}</b></span>
{/capture}
    
{capture name="search_form_title"}
    {if !$sMenuHeadItemSelect}{$sMenuHeadItemSelect = 'master_search'}{/if}
    <span style='font-size:20px;'>{component 'icon' icon='search' } {lang name="plugin.freelancer.text.{$sMenuHeadItemSelect}"}</span>
    
{/capture}

{component 'block' 
    classes = "{$component}"
    title=$smarty.capture.search_form_title
    content=$smarty.capture.search_form
    footer=$smarty.capture.search_form_footer}