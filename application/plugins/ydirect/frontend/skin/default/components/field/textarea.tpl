{**
 * Текстовое поле
 *}

{extends 'component@field.field'}

{block 'field_input'}
    <textarea {field_input_attr_common useValue=false} rows="{$rows}">{$value}</textarea>
    {if $name == 'profile_about'}
        {insert name="block" block="keywords" params=[ 'plugin' => 'ydirect', 'user' => $user]}
    {/if}
{/block}