{$component = 'fl-user-profile'}
{component_define_params params=[ 'oUser', 'mods', 'classes', 'attributes' ]}

<div class="{$component}-info">
    <h3>
        <a href="{$oUser->getUserWebPath()}">{$oUser->getProfileName()}</a> 
        ({lang name="plugin.freelancer.user_role.{$oUser->getStrRole()}"})
        {if $oUser->getPro()}
            {component 'badge' mods="warning large" value="{$oUser->getPro()}"}
        {else}
            {if $oUserCurrent and $oUser->getId() == $oUserCurrent->getId() and !$oUser->isManager()}
                {component 'freelancer:market' text="Купить Pro"}
            {/if}
        {/if}
        <span class="{$component}-rating">{component 'icon' icon='star-o'} Рейтинг: <b>{$oUser->getRating()}</b></span>   
    </h3>
    
    {$aGeo = $oUser->ygeo->getGeo()}
    {$sGeoUrl = {router page="user/search?ygeo={$aGeo->getId()}"}}
    
    {capture name='get_specializations'}
        {if $oUser}
            {$aSpecializations = $oUser->category->getCategories()}
            {if !$aSpecializations|@sizeof}
                <a href="{router page='settings/specialization'}">Выбрать</a>
            {/if}
            {foreach $aSpecializations as $oSpec}
                <a href='{router page="user/search/?specialization[]={$oSpec->getId()}"}'>
                {$sTitleSpec = ($oSpec->getDescription())?$oSpec->getDescription():$oSpec->getTitle()}{$sTitleSpec}</a><br>
            {/foreach}            
        {/if}
    {/capture}
    {$aList= [
        [ 'label' => "Местоположение:", 'icon'=> 'map-marker',
            'content' => "<a href='{$sGeoUrl}'>{$aGeo->getGeoRegionName()}</a>" ],
        [ 'label' => "Дата регистрации:", 'icon'=> 'calendar',
            'content' => "{$oUser->getDateRegister()}" ]
    ]}
    {if $oUser->isMaster()}
        {$aList[] = [ 'label' =>  "Специализация:", 'icon'=> 'address-card-o',
                'content' => {$smarty.capture.get_specializations}        
        ]}
    {/if}
    {component 'info-list' mods="large" list=$aList}   
    
    
</div>