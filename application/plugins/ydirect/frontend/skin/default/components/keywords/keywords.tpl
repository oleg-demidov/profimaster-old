{**
 * Форма добавления/редактирования категории
 *}
 
 {extends 'component@field.field'}

{block 'field_options' append}
    {$component = "yd-keywords"}
    {component_define_params params=[ 'aKeywords' ]}
    {$classes = $component}
{/block}



{block 'field_input'}
    <div class="{$component}">
    {foreach $aKeywords as $oKeyword}
            {component 'ydirect:keywords.item' oKeyword=$oKeyword}
    {/foreach}
    </div>
    {component "ydirect:keywords.form" }
{/block}


