{$component = 'fl-footer'}
<div class="{$component}">
    <div class="ls-grid-row {$component}-inside">
        <div class="ls-grid-col ls-grid-col-4">
            <a class="{$component}-logo" href="{router page='index'}">
                <img src="{Plugin::GetTemplateWebPath('freelancer')}assets/images/logo.png"> Profimaster.kz</a>
                <br>
            {hook run='copyright'}
        </div>
        <div class="ls-grid-col ls-grid-col-4">
            {$aItems = [

                [ 'text' => $aLang.plugin.freelancer.menu.orders, 'classes' => "fl-nav-item" , 
                   'icon'=> 'list', 'url' => {router page='order/search'},  'name' => 'order_search' ],

                [ 'text' => $aLang.plugin.freelancer.menu.masters, 'classes' => "fl-nav-item",
                   'icon'=> 'address-card-o', 'url' => {router page='user/search'},  'name' => 'master_search' ],

                [ 'text' => "Информация", 'classes' => "fl-nav-item",  
                   'icon'=> 'info', 'url' => {router page='info'},  'name' => 'info' ],

                [ 'text' => "Сообщество", 'classes' => "fl-nav-item",  
                   'icon'=> 'users', 'url' => {router page='community'},  'name' => 'blog' ],
                [ 'text' => "Партнерcкая программа", 'classes' => "fl-nav-item",  
                   'icon'=> 'money', 'url' => "{router page='info'}manager",  'name' => 'manager_info' ]
            ]}
            {if $oUserCurrent}
                {$aItems[] = [ 'text' => "Моя партнерка", 'classes' => "fl-nav-item",  
                       'icon'=> 'link', 'url' => "{router page='manager'}{$oUserCurrent->getLogin()}",  'name' => 'manager_profile' ]}
            {/if}
            {component 'nav' hook='footer' activeItem=$sMenuHeadItemSelect mods='stacked footer' items=$aItems}
        </div>
        <div class="ls-grid-col ls-grid-col-4">
            <h4>Контакты</h4>
            <b>notify@profimaster.kz</b>
        </div>
    </div>
</div>
