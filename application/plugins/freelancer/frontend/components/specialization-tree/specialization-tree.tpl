{**
 * Вывод категорий на странице создания нового объекта
 *}
{extends 'component@field.field'}

{block 'field_options' append}    
    {component_define_params params=[ 'aSpecializations', 'specializationSelected',  'params', 'mods', 'classes', 'attributes' ]}
{/block}

{if !is_array($specializationSelected)}
    {$specializationSelected=[]}
{/if}
{*function get_items_childs oSpecialization= []}
    {$aSpecChilds = $oSpecialization->getChildren()}
    
    {$aItemsMenu = []}
    {foreach $aSpecChilds as $oSpecChild}
        {$aItemsMenu[] = {get_items_childs  oSpecialization=$oSpecChild}}
    {/foreach}
    
    {$aItem = ['text' => $oSpecialization->getTitle(), 'menu' => $aItemsMenu ]}
    
    {return $aItem}
{/function*}

{block 'field_input'}
    {$component2 = "fl-specialization-tree"}
    {$aItems =  $LS->Category_GetMenuTree($aSpecializations, $specializationSelected)}

    <div class="{$component2}-root">
        {component 'button' 
            template='group' 
            classes = $component2
            buttons=[
                {component 'dropdown' text='Выбрать' menu=$aItems isSubnav=true},
                {component 'dropdown' text='Выбрано <b>0</b>' mods="count" menu=[[]] classes = "{$component2}-count"},
                
                ['attributes'=>['title' => 'Сбросить'], 'icon'=>'close', 'type' => 'button', 'classes' => "{$component2}-reset"  ]
            ]}
        <div class="{$component2}-inputs"></div>
    </div>
{/block}



