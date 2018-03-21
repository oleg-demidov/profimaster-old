
{$component = 'fl-register-master'}
{component_define_params params=[ 'oUser']}

<form method="POST">
    
{component 'ymaps:fields.ajaxgeo' 
            classes="js-search-form-geo"
            label={lang name='user.settings.profile.fields.place.label'} 
            place=$oUser->getGeoTarget()
            oLocation=$oUser->_getDataOne('_location_for_save')
            countries = $aGeoCountries
            regions   = $aGeoRegions
            cities    = $aGeoCities
            choosenGeo     = $oGeo} 
            
{$contentReturn}

{component 'editor'
    label ="Описание ваших услуг"
    rows = 5
    type = "visual"
    set             = $editorSet|default:'light'
    name            = 'about'
    inputClasses    = 'js-about-text'
    help            = true
    value=$sText}
                
{*component 'field.textarea' label="Описание услуг" name="about" note="Опишите подробнее ваши услуги" rows="10"*}
{component 'button' type='submit' text="Далее" mods="primary large"}
</form>