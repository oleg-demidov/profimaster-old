{**
 * Список всех пользователей
 *
 * @param array   $users
 * @param integer $searchCount
 * @param array   $countriesUsed
 * @param array   $paging
 * @param array   $usersStat
 *}

{extends 'layouts/layout.base.tpl'}


{block 'layout_content'}
    
    {* breadcrumbs *}
    {if {$specializationSelected|@sizeof}}
        {component 'freelancer:search-form.breadcrumbs' aCategories=$specializationSelected}
    {/if}
    
    {* Сортировка *}
    {component 'sort' template='ajax'
        classes = 'js-search-sort js-search-sort-menu'
        text = $aLang.sort.by_rating
        items = [
            [ name => 'user_rating',        text => $aLang.sort.by_rating, order => 'asc' ],
            [ name => 'user_login',         text => $aLang.sort.by_login ],
            [ name => 'user_date_register', text => $aLang.sort.by_date_registration ]
        ]}
        
    {* Вид *}
    {component 'ymaps:search-map.toggle'}
    
    <div class="fl-map-container"></div>

    {* Список пользователей *}
    {component "freelancer:master.page" 
        aMasters=$aMasters 
        classes="js-search-ajax-masters"
        aPaging=$aPaging}
{/block}