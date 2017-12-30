{**
 * Вывод категорий на странице создания нового объекта
 *}

{* TODO: Конфликт со спец параметром params компонентов *}
{$component = "specializations"}
{component_define_params params=[ 'specializations', 'specializationSelected', 'params', 'mods', 'classes', 'attributes' ]}

{if !$specializationSelected}
    {$specializationSelected = $oOrder->getSpecialization()}
{/if}

<div class="{$component}-master">
    {component 'field' label="Доступные специализации:"}
    {foreach $specializations as $ch}
        {$check = in_array( $ch->getId(), {$specializationSelected|default:[]} )}
        {component 'field.checkbox' 
            name="specialization[]" 
            classes="{$component}-checkbox master-checkbox child {if $check}checked{/if}" 
            value=$ch->getId() 
            label=$ch->getTitle() 
            checked=$check}
    {/foreach}
</div>
