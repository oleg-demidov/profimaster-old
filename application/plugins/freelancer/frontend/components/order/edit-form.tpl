{$component = "fl-order-edit-form"}
{component_define_params params=[ 'oOrder' ]}

<form action="" method="post" class="{$component}"  enctype="multipart/form-data" >
    {if $oMaster}
        {$aSpecializations = $oMaster->category->getCategories()}
        {component 'freelancer:user.middle' oUser=$oMaster}
        {component 'field.hidden' value=$oMaster->getId() name='master_id'}
        {component 'freelancer:specialization-tabs.master' specializations=$aSpecializations}
    {else}
        {$aSpecializations = $oOrder->category->getCategories()}
        {$aSpecIds = []}
        {foreach $aSpecializations as $oSpecialization}
            {$aSpecIds[] = $oSpecialization->getId()}            
        {/foreach}
        {component 'freelancer:specialization.tree' 
            specializationSelected = $aSpecIds
            aSpecializations=$specializations 
            label="Специализация"}
    {/if}
    {if !$oUserCurrent->isRoleEmployerSpecializationOrder() and !$oUserCurrent->isPro()}
        {component 'freelancer:market' text="Добавить еще специализации" sTargetType="role" iTargetId="employer_specialization_order"}
    {/if}
    {* Местоположение *}
    {*hook run="freelancer_order_form" assign='contentReturn' target = $oOrder}
    {if $contentReturn}
        {$contentReturn}
    {else}
        {insert name="block" block="defaultGeo" 
            params=[
                'plugin'=>'freelancer',
                'geo_target'=>$oGeoTarget 
            ]} 
    {/if*}
    {component 'ymaps:fields.ajaxgeo' 
            classes="js-order-form-geo"
            label=$aLang.plugin.ymaps.field.label
            choosenGeo     = $oGeoObject}
            
    {component 'field.text' value={$oOrder->getTitle()} name='title' label={$aLang.plugin.freelancer.text.form.order.title}}
    {component 'field.textarea' name='text_about' value={$oOrder->getTextAbout()} label={$aLang.plugin.freelancer.text.about_order}}
    {component 'field.text' 
        name='budjet'
        value={$oOrder->getBudjet()} 
        label={$aLang.plugin.freelancer.text.form.order.budjet}
        note="Оставить пустым если договорной"}

    
    
    {component 'freelancer:media.form' oTarget=$oOrder}
    {component 'button' text={$aLang.plugin.freelancer.text.save}}    
</form>
{component 'freelancer:media' oUser=$oUser}