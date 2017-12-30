{**
 * Блок с фотографией пользователя в профиле
 *}
{$component = 'fl-user-photo'}
{component_define_params params=[ 'oUser', 'mods', 'classes', 'attributes' ]}

{$oUser = $oUserProfile|default:$oUser}
{capture 'block_content'}
    {$session = $oUser->getSession()}

    {* Статус онлайн\оффлайн *}
    {if $session}
        {if $oUser->isOnline() &&  $smarty.now - strtotime($session->getDateLast()) < 60*5}
            <div class="user-status user-status--online">{$aLang.user.status.online}</div>
        {else}
            <div class="user-status user-status--offline">
                {$date = {date_format date=$session->getDateLast() hours_back="12" minutes_back="60" day_back="8" now="60*5" day="day H:i" format="j F в G:i"}|lower}

                {if $oUser->getProfileSex() != 'woman'}
                    {lang name='user.status.was_online_male' date=$date}
                {else}
                    {lang name='user.status.was_online_female' date=$date}
                {/if}
            </div>
        {/if}
    {/if}

    {component 'photo'
        classes      = "{$component} js-user-photo"
        hasPhoto     = $oUser->getProfileFoto()
        editable     = $oUser->isAllowEdit()
        targetId     = $oUser->getId()
        url          = $oUser->getUserWebPath()
        photoPath    = $oUser->getProfileFotoPath()
        photoAltText = $oUser->getDisplayName()}
{/capture}

{component 'block'
    mods     = 'user-photo'
    content = $smarty.capture.block_content}