{$component = 'fl-block-contacts'}

{$oUser = $oUserProfile|default:$oUser}

{$aContacts = $LS->User_getUserFieldsValues($oUser->getId(), true, ['contact', 'social'])}

{$aIcons = [
    "phone" => "phone",
    "vkontakte" => "vk",
    "E-mail" => "envelope-o"
]}

{capture 'content'} 
{foreach $aContacts as $oField}
    {if $oField->getName() == 'phone'}
        {$isAllowContact = ($oUserCurrent and !$oUserCurrent->isViewEmployerContacts() and $oUser->isEmployer())}
        
        {*$oField|print_r*}
        {*if $isAllowContact}{component 'freelancer:market.tool' text="Показать контакты" mods="large"}{/if*}
        {$aList[] = ['label' => $oField->getTitle(),'icon'=>{$aIcons[$oField->getName()]},  
                'content' => {component 'freelancer:phone-hide' oField=$oField}]}
        {continue}
    {/if}
    {if $oField->getPattern()}
        {$sContent = {$oField->getPattern()|replace:'{*}':$oField->getValue()}}
    {else}
        {$sContent = $oField->getValue()}
    {/if}
    {$aList[] =  ['label' => $oField->getTitle(), 'icon'=>{$aIcons[$oField->getName()]}, 'content' => $sContent]}
{/foreach}


{component 'info-list' mods="large slender" list=$aList}

{/capture}

{if !($oUserCurrent and $oUser->getId()== $oUserCurrent->getId()) and {$aContacts|@sizeof}}
    {component 'block' content=$smarty.capture.content}
{/if}
