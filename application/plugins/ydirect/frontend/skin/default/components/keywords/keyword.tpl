{**
 * Форма добавления/редактирования категории
 *}
{$component = "yd-keyword"}
{component_define_params params=[ 'oKeyword' ]}

<div class="{$component}" id="kid{$oKeyword->getId()}">
    {component 'field.text' name="keywords[{$oKeyword->getId()}]" value=$oKeyword->getValue()}
    {component 'button' classes="{$component}-remove" type="button" attributes=['data-keyword-id' => {$oKeyword->getId()}]  mods="small" icon="times"}
    {if $oKeyword->getStatus() == 'accepted'}
    {component 'icon' icon='check' mods="large"}
    {/if}
</div>