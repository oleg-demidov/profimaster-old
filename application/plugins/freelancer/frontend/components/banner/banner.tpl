{$component = 'fl-banner'}
{component_define_params params=[ 'sUrl' ]}

<div class="{$component}">
    <div class="{$component}-cont">
        <h1>Стань мастером и зарабатывай вместе с <br><img src="{Plugin::GetWebPath('freelancer')}frontend/components/banner/img/logo.png"/></h1>
        <div class="{$component}-button">{component 'button' url={router page="fauth/register_master/step1"} mods="large warning" text="Стать мастером"}
        <br>Получай заказы от лучших заказчиков казнета</div>
        <div class="{$component}-button">{component 'button' url={router page="fauth/register_employer/step1"} mods="large primary" text="Стать заказчиком"}
        <br>Выбирай лучших исполнителей твоих заказов</div>
        
    </div>
</div>
    