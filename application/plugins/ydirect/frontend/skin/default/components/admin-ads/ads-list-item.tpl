{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'yd-ads-item'}
{component_define_params params=[ 'oAds', 'num']}

{capture 'content'}
    <h5><b>{$num}</b>. <a href="{$oAds->getHref()}">{$oAds->getTitle()}</a></h5>
    <p>{$oAds->getText()}</p>
{/capture}

{capture 'mods'}
    {$mods = ''}
    {if $oAds->getStatus() == 'draft'}{$mods = 'warning'}{/if}
    {if $oAds->getStatus() == 'rejected'}{$mods = 'alert'}{/if}
    {if $oAds->getStatus() == 'accepted'}{$mods = 'success'}{/if}
{/capture}

{component 'block' 
    mods=$mods
    classes=$component
    content=$smarty.capture.content
    footer={component 'button' type="button" classes="{$component}-remove" attributes=['data-ads-id' => $oAds->getId()] text="Удалить"}}
