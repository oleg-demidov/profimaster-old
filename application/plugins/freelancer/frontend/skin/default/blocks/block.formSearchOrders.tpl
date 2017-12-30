<section class="block block-poisk">
    <header class="block-header">
        <h3>Поиск</h3>
    </header>
    <form action="{$sPathAction}" method="POST">
        {* Местоположение *}
        {component 'field' template='geo'
            classes   = 'js-field-geo-default'
            name      = 'geo'
            label     = {lang name='user.settings.profile.fields.place.label'}
            countries = $aGeoCountries
            regions   = $aGeoRegions
            cities    = $aGeoCities
            place     = $oGeoTarget} 
        
        {insert name="block" block="fieldCategory" 
            params=[ 'label_name' => {lang name='plugin.freelancer.text.specialization'}, 'target' => $oOrder, 'entity' => 'PluginFreelancer_ModuleOrder_EntityOrder' ]}
       <input type="submit"/>
    </form>
        
        
       
</section>
