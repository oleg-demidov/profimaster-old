{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-portfolio-work-small-item'}
{component_define_params params=[ 'oWork', 'mods' ]}

{$oMedia = $oWork->media->getMediaOne()}
{if $oMedia}
<div class="{cmods name=$component mods=$mods} {$component}">
  <a href="{$oMedia->getFileWebPath('800')}" class="js-{$component}-lightbox">
    
        <img src="{$oMedia->getFileWebPath('70x70crop')}" class="{$component}-img"><br>
    
    {*$oWork->getTitle()*}
  </a>
</div>
{/if}