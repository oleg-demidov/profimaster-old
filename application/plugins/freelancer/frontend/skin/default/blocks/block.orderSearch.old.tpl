{capture name="search_form"}
<section class="block block-poisk">
    <form action="{$sAction}" method="GET"> 
        {*Специализация*}
        {insert name="block" block="specialization" 
            params=[ 
            'plugin' => 'freelancer',
            'label_name' => {lang name='plugin.freelancer.text.specialization'}, 
            'target' => $oTarget, 
            'entity' => $sEntity,
            'form_field' => 'specialization' ]}
            <div id="action_search">
        {* Местоположение *}
        
        {insert name="block" block="defaultGeo" 
        params=[
            'plugin'=>'freelancer',
            'geo_target'=>$oGeoTarget 
        ]} 
        {component 'button' template='group' classes="order_buttons"  type="button" buttons=$selectItems}
        </div>
        {*component 'field.select' name="order" items=$selectItems selectedValue=$selectedItem*}
        {component 'button' classes="but_submit" text="Искать" mods="primary"}
    </form>    
        
       
</section>
{/capture}
{component 'block' 
title="<span style='font-size:20px;'>{component 'icon' icon='search' } {$aLang.plugin.freelancer.text.order.title_search}</h3>" 
content=$smarty.capture.search_form
footer="<div class='count_orders'>результатов: {$aOrdersCount}</div>"}