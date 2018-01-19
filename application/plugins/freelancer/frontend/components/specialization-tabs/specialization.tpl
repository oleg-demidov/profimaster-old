{**
 * Вывод категорий на странице создания нового объекта
 *}

{* TODO: Конфликт со спец параметром params компонентов *}
{$component = "specializations"}
{component_define_params params=[ 'specializations', 'specializationSelected',  'params', 'mods', 'classes', 'attributes' ]}
{* Получаем id выделеных категорий *}
{if !is_array($specializationSelected)}
    {$specializationSelected=[]}
{/if}
{$aTabs = []}
{function 'get_checkbox' spec=0 check=0 title=0}
    {if $spec}
        {component 'field.checkbox' 
            classes="{$component}-checkbox child {if $title}title{/if} {if $check}checked{/if}" 
            value=$spec->getId() 
            label="{$spec->getTitle()} {if $spec->getCountTarget() and !$title}{component 'badge' mods='warning' value=$spec->getCountTarget()}{/if}" 
            checked=$check}
    {/if}
{/function}
{function get_items_childs category = []}
    {$childrens = $category->getChildren()}
    {foreach $childrens as $children}
        <div class="select_tree">
            {$check = in_array( $children->getId(), $specializationSelected )}
            {get_checkbox spec=$children check=$check title=1}
            <div class="select_subtree">
            {$childs = $children->getChildren()}
            {foreach $childs as $child}
                {$check = in_array( $child->getId(), $specializationSelected )}
                {get_checkbox spec=$child check=$check}<div class="select_subtree">
                {$chs = $child->getChildren()}
                {foreach $chs as $ch}
                    {$check = in_array( $ch->getId(), $specializationSelected )}
                    {get_checkbox spec=$ch check=$check}
                {/foreach}
                </div>
            {/foreach}
            </div>
        </div>
    {/foreach}
{/function}

{$aIcons = [
    2 => 'building-o',
    60 =>'eye',
    105 => 'camera-retro',
    112 => 'microchip',
    135 => 'car'
]}

{foreach $specializations as $specialization}
    {$aData = $specialization->getData()}
    {$aTabs[] = [
        'text' => "{component 'icon' mods='large' icon={$aData['icon']}} {$specialization->getTitle()}",
        'content' => {get_items_childs category=$specialization}
    ]}
{/foreach}
{component 'tabs' classes='js-specializations-tabs' tabs=$aTabs}