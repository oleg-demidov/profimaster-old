{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 
 {extends 'component@field.field'}

{block 'field_options' append}
    {$component = "yd-ads"}
    {component_define_params params=[ 'aAds' ]}
    {$classes = $component}
{/block}



{block 'field_input'}
    <div class="{$component}">
        {$iAds = 1}
        {foreach $aAds as $oAds}
            {component 'ydirect:admin-ads.item' oAds=$oAds num={$iAds++}}
            
        {/foreach}
    </div>
    {component 'ydirect:admin-ads.form'}
{/block}


