{$component = 'fl-search-form'}
{component_define_params params=['sEntity', 'mods', 'orderItems', 'classes', 'attributes' ]}

{capture name="search_form" }
    <form  method="GET" class="{$component}" action="{$action}" > 
        <div class='ls-grid-row'>
            <div class='ls-grid-col ls-grid-col-4'>
                {component 'freelancer:specialization.tree' 
                    specializationSelected = $specializationSelected
                    aSpecializations=$specializations 
                    label="Специализация"}
            </div>
            <div class='ls-grid-col ls-grid-col-3'>
                {hook run="freelancer_search_form" assign='contentReturn' target = $oUserCurrent}
                {$contentReturn}
            </div>
            <div class='ls-grid-col ls-grid-col-5'>
                {component 'freelancer:search.sort' label="Сортировать" orderItems=$orderItems}
            </div>
        </div>
    
    {*component 'button' classes="{$component}-but-submit" text="Найти" mods="primary"*}
 </form>      
{/capture}
    
{capture name="search_form_footer"}
    <div class='{$component}-count-result'>результатов: <b>{$iCount}</b></div>  
     {component 'button' classes="{$component}-but-submit" text="Найти" mods="primary"}
{/capture}
    
{capture name="search_form_title"}
    {if !$sMenuHeadItemSelect}{$sMenuHeadItemSelect = 'master_search'}{/if}
    <span style='font-size:20px;'>{component 'icon' icon='search' } {lang name="plugin.freelancer.text.{$sMenuHeadItemSelect}"}</span>
    {if $sMenuHeadItemSelect == 'order_search'}
        {if $oUserCurrent }
            {if $oUserCurrent->isEmployer()}
                {component 'button' mods="success" url="{router page='order/add'}" text="Создать заказ" classes="but_add_order"}
            {/if}
        {else}
            {component 'button' mods="success" url="{router page='user/register_employer/step1'}" text="Создать заказ" classes="but_add_order"}
        {/if}
    {/if}
{/capture}

{component 'block' 
    classes = "{$component}"
    title=$smarty.capture.search_form_title
    content=$smarty.capture.search_form
    footer=$smarty.capture.search_form_footer}