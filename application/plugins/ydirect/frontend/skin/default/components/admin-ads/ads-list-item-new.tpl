{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'admin-ads-new'}
{component_define_params params=[ 'oUser' , 'classes' ]}
{capture name="item"}
    {component 'user.list-item' user=$oUser}
    {$aCategories = $oUser->category->getCategories()}
        Категории: 
    {foreach $aCategories as $oCategory}
       {component 'badge' value={$oCategory->getTitle()}} 
    {/foreach}
    {component 'button' template='toolbar' groups=[
        [
            'buttons' => [
                [ 
                    'icon' => 'edit', 
                    'url' => {{router page='admin/plugin/ydirect/ads/add'}|cat:$oUser->getId()},
                    'text' => 'Начать'
                ]
            ]
        ]
    ]}
{/capture}
{component 'block' classes="{$component} {$classes}" content=$smarty.capture.item}

    
    
