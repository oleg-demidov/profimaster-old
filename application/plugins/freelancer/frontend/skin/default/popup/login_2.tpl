{assign var=show_form value=false}
{if $oConfig->GetValue('plugin.socialauthlite.networks.vkontakte.enable') == 1}
    {assign var=show_form value=true}
{/if}

{if $show_form}
<div class="socialauth {$theme}">
    <h2>{$aLang.plugin.socialauthlite.login_with}</h2>

    <ul class="socialnetworks">
        {if $oConfig->GetValue('plugin.socialauthlite.networks.vkontakte.enable') == 1}
            <li>
                <a href="#" class="js-auth-vk">
                    <img src="{$aTemplateWebPathPlugin.socialauthlite}/img/vkontakte.png"/>
                </a>
            </li>
        {/if}

        {hook run='socialauth_newtorks_list'}
    </ul>

    <div class="separator">
        <span>{$aLang.plugin.socialauthlite.separator_or}</span>
        <hr/>
    </div>
</div>
{/if}