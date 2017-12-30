{component_define_params params=[ 'oTarget']}
{if $oTarget}
    {$aMedias = $oTarget->media->getMedia()}
    {capture name="media_items"}
        <div class="media_items">
        {foreach $aMedias as $oMedia}
            <a class="js-lbx" href="{$oMedia->getFileWebPath()}">
                <div class="but_close" id="{$oMedia->getId()}">X</div>
                <img src="{$oMedia->getFileWebPath100x100crop()}">
            </a>
        {/foreach}
        </div>
    {/capture}
    {component 'block' 
        content={$smarty.capture.media_items}
        title={$aLang.plugin.freelancer.text.media.image}
        footer={component 'button'
            type='button'
            text={$aLang.plugin.freelancer.text.media.add}
            classes='user-media-mymodal-toggle'
            attributes=[ 'data-lsmodaltoggle-modal' => "media_modal_user" ]}}
    {$iNum = 1}
    {foreach $aMedias as $oMedia}
        <input type="hidden" name="media[{$iNum}]" class="attach_media" value="{$oMedia->getId()}">
        {$iNum = $iNum + 1}
    {/foreach}
     {component 'field.hidden' classes="media_ids"}
{/if}

