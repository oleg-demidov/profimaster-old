{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-master-item'}
{component_define_params params=[ 'oMaster', 'mods','back' ]}

{if $oMaster->isMasterTop()}
    {$mods = "{$mods} success"}
{/if}

{capture 'content'}
    <div class="{$component}-block">
        {component 'freelancer:user.avatar' user=$oMaster classes="{$component}-avatar"}
    </div>
    <div class="{$component}-block">
        <a class="{$component}-name" href="{$oMaster->getUserWebPath()}">
            {if $oMaster->getProfileName()}{$oMaster->getProfileName()}{else}{$oMaster->getLogin()}{/if}</a>
        {component 'badge' value=$oMaster->getPro() mods="warning"}
        {$aWorks = $oMaster->getWorks(3)}
        {if $aWorks}
            {component 'freelancer:portfolio.work.small.list' aWorks=$aWorks 
                attributes=['data-group' => "group{$oMaster->getId()}"]}
        {/if}
    </div>
    <div class="{$component}-block-right">
        <span class="{$component}-rating">{component 'icon' icon='star' classes="{$component}-rating-icon" } Рейтинг: <b>{$oMaster->getRating()}</b></span>
    </div>
    
    {capture 'specializations'}
        {$aSpecializations = $oMaster->category->getCategories()}
        {foreach from=$aSpecializations item='oSpecialization' name='specs'}
            {if $oSpecialization->getDescription()}
                {$oSpecialization->getDescription()}
            {else}
                {$oSpecialization->getTitle()}
            {/if}
            {if !$smarty.foreach.specs.last}
                ,&nbsp;
            {/if}
        {/foreach}
        {if !{$aSpecializations|sizeof}}
            Не выбрано
        {/if}
    {/capture}
    
    <div class="ls-grid-row {$component}-spec-geo">
        <div class="ls-grid-col ls-grid-col-6">
        {component 'info-list'
            classes="{$component}-spec"
            list = [['label' => 'Специализация:', 'icon' => 'address-card-o', 'content' =>  $smarty.capture.specializations]]}
        </div>
        <div class="ls-grid-col ls-grid-col-6">
        {$oGeo = $oMaster->ygeo->getGeo()} 
        {if $oGeo}
            {$sGeo = $oGeo->getGeoRegionName()}
        {else}
            {$sGeo = "Не выбрано"}
        {/if}
        {component 'freelancer:modal-map' text=$sGeo oGeo=$oMaster->ymaps->getGeo()}
        </div>
    </div>
        
    
{/capture}

{capture 'footer'}
    {component 'freelancer:master.actionbar' oMaster=$oMaster}
    
{/capture}

{component 'block' 
    mods=$mods
    classes="{cmods name=$component mods=$mods} {$component}"
    content=$smarty.capture.content
    footer=$smarty.capture.footer
}
