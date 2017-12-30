

{$component = 'fl-invites-users'}
{component_define_params params=[ 'aUsersInvite']}

    
{function 'get_specializations' oUser=0}
    {if $oUser}
        {$aSpecializations = $oUser->category->getCategories()}
        {if !$aSpecializations|@sizeof}
            Не выбрано
        {/if}
        {foreach $aSpecializations as $oSpec}
            <a href='{router page="user/search/?specialization[]={$oSpec->getId()}"}'>
            {$sTitleSpec = ($oSpec->getDescription())?$oSpec->getDescription():$oSpec->getTitle()}{$sTitleSpec}</a><br>
        {/foreach}            
    {/if}
{/function}

{function 'get_geo' oUser=0}
    {if $oUser}
        {$oGeo = $oUser->ygeo->getGeo()}
        {$sGeoUrl = {router page="user/search?ygeo={$oGeo->getId()}"}}
        {if !$oGeo|@sizeof}
            Не выбрано
        {else}
            <a href='{$sGeoUrl}'>{$oGeo->getGeoRegionName()}</a>
        {/if}
    {/if}
{/function}

{function 'get_pay' oUser=0}
    {if $oUser}
        {$oGeo = $oUser->ygeo->getGeo()}
        {$sGeoUrl = {router page="user/search?ygeo={$oGeo->getId()}"}}
        {if !$oGeo|@sizeof}
            Не выбрано
        {else}
            <a href='{$sGeoUrl}'>{$oGeo->getGeoRegionName()}</a>
        {/if}
    {/if}
{/function}

<table class="ls-table {$component}">
        <tr>
            <th>
                Пользователь
            </th>
            <th>
             Специализация
            </th>
            <th>
            Местоположение
            </th>   
            <th>
            Оплачено
            </th>
        </tr>
        
{foreach $aUsersInvite as $oUserInvite}
    <tr>
        <td>
        {component 'freelancer:user.small' 
        oUser=$oUserInvite
        attributes=['title' =>"Дата регистрации {$oUserInvite->getDateRegister()}" ]}
        </td>
        <td>
        {get_specializations oUser=$oUserInvite}
        </td>
        <td>
        {get_geo oUser=$oUserInvite}
        </td> 
        <td>
        {$oUserInvite->getPaySumm()} {Config::Get('plugin.freelancer.market.str_currency')}
        </td>
    </tr>
{/foreach}

</table>

{component 'pagination' 
    total=+$paging.iCountPage 
    current=+$paging.iCurrentPage 
    url="{$paging.sBaseUrl}/page__page__/{$paging.sGetParams}" 
    classes='js-pagination-invites'}