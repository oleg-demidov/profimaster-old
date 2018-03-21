{$component = 'fl-search-breadcrumbs'}
{component_define_params params=['aCategories']}

{$aItems = [
    ['text' => {$aLang.plugin.freelancer.search_form.breadcrubs_first}, 'url' => {router page="masters"}]
]}
{foreach $aCategories as $oCategory}
    {$aItems[] = [
        'text' => $oCategory->getTitle(), 
        'name' => $oCategory->getUrl(), 
        'url' => {router page="masters/{$oCategory->getUrlFull()}"}
    ]}
{/foreach}
{component 'freelancer:breadcrumb' items=$aItems classes=$component}
    