{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-portfolio-work-item'}
{component_define_params params=[ 'oWork', 'mods' ]}

{capture 'title'}
    {$oWork->getTitle()}
    
{/capture}

{capture 'content'}
    {*$oOrder = $oWork->getOrder()}
    {if $oOrder}
        {component 'block' 
        title="Заказ"        
        content={component 'freelancer:order.mini' oOrder=$oOrder}}
    {/if*}
    {$aMedia = $oWork->media->getMedia()}
    {$aImages = []}
    {foreach $aMedia as $oMedia}
        {$aImages[] = ['src' => $oMedia->getFileWebPath('200x')]}
    {/foreach}
    {component 'slider' classes="js-{$component}-slider {$component}-slider" images=$aImages}  
    
    {component 'text' text=$oWork->getText()}
{/capture}


{capture 'footer'}
    
    {*if $oUserCurrent->getId() == $oResponse->getUserId()}
        {component 'freelancer:response.buttons-edit' oResponse=$oResponse}
    {/if*}
    
    {component 'info-list' classes="{$component}-date" list=[
        [ 'label' => "{component 'icon' icon='plus'} Добавлено:", 'content' => $oWork->getDateCreate() ]        
    ]}
    {if $oUserCurrent and $oUserCurrent->getId() == $oWork->getUserId()}
        {component 'freelancer:portfolio.work.buttons' oWork=$oWork back={router page="user/{$oUserCurrent->getId()}/portfolio"}}
    {/if}
    {if $oUserCurrent}
    {component 'freelancer:favourite' oTarget=$oWork}
    {/if}
{/capture}


{component 'block' 
    mods=$mods
    classes="{cmods name=$component mods=$mods} {$component} "
    title=$smarty.capture.title
    content=$smarty.capture.content
    footer=$smarty.capture.footer
}
