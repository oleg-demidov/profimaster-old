{extends 'component@field.field'}

{block 'field_options' append}
{component_define_params params=[ 'label','aGeoItems','selectedItem' ]}
{/block}

{block 'field_input'}
{$aItems =[]}
{foreach $aGeoItems as $oGeoItem}
    {$aItems[] = ['text' => $oGeoItem->getGeoRegionName(), 'data' => [ 'id' => $oGeoItem->getId()]]}
{/foreach}

{component 'dropdown' 
    icon="globe"
    text=$selectedItem->getGeoRegionName()     
    classes='ygeo-dropdown' 
    menu=$aItems}
    <input type='hidden' name="ygeo" value={$selectedItem->getId()}>
{/block}