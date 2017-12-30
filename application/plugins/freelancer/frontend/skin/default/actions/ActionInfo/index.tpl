{**
 * Добавление о себе
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    <h1>Информация</h1>
    
    {*component 'tabs' classes='js-fl-info' tabs=[
        [ text => 'Регистрация', content => {component 'text' text={include './reg.tpl'}} ],
        [ text => 'После регистрации', content => {component 'text' text={include './after_reg.tpl'}} ],
        [ text => 'Для мастера', content => {component 'text' text={include './master.tpl'}} ],
        [ text => 'Для заказчика', content => {component 'text' text={include './employer.tpl'}} ],
        [ text => 'Оферта', content => {component 'text' text={include './polz.tpl'}} ],
        [ text => 'Партнерка', content => {component 'text' text={include './manager.tpl'}} ]
    ]*}
    
    {component 'nav'
        activeItem = $sCurrentEvent
        mods = 'pills'
        items=[
            [ 'name' => 'reg', 'url' => {router page="info/reg"}, 'text' => 'Регистрация' ],
            [ 'name' => 'after_reg', 'url' => {router page="info/after_reg"}, 'text' => 'После регистрации' ],
            [ 'name' => 'master', 'url' => {router page="info/master"}, 'text' => 'Для мастера' ],
            [ 'name' => 'employer', 'url' => {router page="info/employer"}, 'text' => 'Для заказчика' ],
            [ 'name' => 'polz', 'url' => {router page="info/polz"}, 'text' => 'Оферта' ],
            [ 'name' => 'manager', 'url' => {router page="info/manager"}, 'text' => 'Партнерка' ]
    ]}
    {component 'text' text={include "./{$sCurrentEvent}.tpl"}}
{/block}

{block 'layout_body_end' append}
    <script>
    jQuery(function($) {
        $('.js-fl-info').lsTabs();
    });
</script>
{/block}