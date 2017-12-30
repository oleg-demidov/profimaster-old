{**
 * Вывод категорий на странице создания нового объекта
 *}
{extends 'component@field.field'}

{block 'field_options' append}    
    {component_define_params params=[ 'aSpecializations', 'specializationSelected',  'params', 'mods', 'classes', 'attributes' ]}
{/block}

{block 'field_input'}
    
{function name='field_items_loop' aSpecializations=[] itemsnew = []}
    {if is_array($aSpecializations)}
        {foreach $aSpecializations as $oSpecialization}
            {if is_array( $oSpecialization.value )}
                {$aMenu = []}
                {field_items_loop aSpecializations=$oSpecialization.value itemsnew=$aMenu}
                {$itemsnew[] = ['text' => $oSpecialization.entity->getTitle(), 'menu' => $aMenu]}
                
            {else}
                {$isSelected = ( is_array( $selectedValue ) ) ? in_array( $oSpecialization.entity->getId(), $selectedValue ) : ( $oSpecialization.entity->getId() == $selectedValue )}

                {$itemsnew[] = ['html' => {component 'field.checkbox' 
                                            value=$oSpecialization.entity->getId()
                                            classes="fl-specialization-tree-checkbox" 
                                            label=$oSpecialization.entity->getTitle() 
                                            checked=$isSelected}]}
                
            {/if}
        {/foreach}
    {/if}
{/function}




    {$component2 = "fl-specialization-tree"}
    {field_items_loop aSpecializations=$aSpecializations}

    <div class="{$component2}-root">
        {component 'button' 
            template='group' 
            classes = $component2
            buttons=[
                {component 'dropdown' text='Выбрать' menu=$itemsnew isSubnav=true},
                {component 'dropdown' text='Выбрано <b>0</b>' mods="count" menu=[[]] classes = "{$component2}-count"},
                
                ['attributes'=>['title' => 'Сбросить'], 'icon'=>'close', 'type' => 'button', 'classes' => "{$component2}-reset"  ]
            ]}
        <div class="{$component2}-inputs"></div>
    </div>
{/block}



