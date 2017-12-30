
{$component = 'fl-employer-side'}
{component_define_params params=[]}


{capture 'title'}
    {component 'icon' icon='user'} Заказчик
{/capture}
{capture 'content'}
    <div class="{$component} {$classes}" data-user-id="{$oEmployer->getId()}" {cattr list=$attributes}>
        <div class="{$component}-avatar">
            {component 'freelancer:user' template='avatar' size='large' user=$oEmployer isName=1}            
        </div>
        <div class="{$component}-sub">
            {$aGeo = $oEmployer->ygeo->getGeo()}
            {$sGeoUrl = {router page="user/search?ygeo={$aGeo->getId()}"}}
            {component 'info-list' list=[
                
                [ 'label' => "{component 'icon' icon='star'} Рейтинг:", 
                    'content' => {$oEmployer->getRating()} ],
                [ 'label' => "{component 'icon' icon='cart-plus'} {$aLang.plugin.freelancer.str_user_role.{$oEmployer->getStrRole()}} заказов:", 
                    'content' => "<a href='{$oEmployer->getUserWebPath()}orders'>{$oEmployer->getCountOrders()}</a>" ],
                [ 'label' => "{component 'icon' icon='comments-o'} Отзывов:", 
                    'content' => "<a href='{$oEmployer->getUserWebPath()}responses'>{$oEmployer->getCountResponsed()}</a>" ],
                [ 'label' => "{component 'icon' icon='map-marker'} Местоположение:", 
                    'content' => "<a href='{$sGeoUrl}'>{$aGeo->getGeoRegionName()}</a>" ]
            ]}
        </div>
    </div>
{/capture}
{component 'block' title=$smarty.capture.title content=$smarty.capture.content}