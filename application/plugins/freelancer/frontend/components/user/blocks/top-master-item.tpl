
{$component = 'fl-top-master-item'}
{component_define_params params=['oMaster']}


<table class="{$component}">
    <tr><td rowspan="2">
        {component 'freelancer:user' template='avatar' user=$oMaster isName=0}
    </td><td>
        <a href='{$oMaster->getUserWebPath()}'>{$oMaster->getProfileName()}</a>
        {component 'badge' value=$oMaster->getPro() }
    </td></tr>
        
    <tr><td>
        {$aWorks = $oMaster->getWorks(3)}
        {if $aWorks}
            {component 'freelancer:portfolio.work.small.list' aWorks=$aWorks}
        {/if}
    </td></tr>
</table>