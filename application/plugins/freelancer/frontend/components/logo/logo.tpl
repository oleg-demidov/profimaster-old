{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-logo'}
{component_define_params params=['url' ]}

<a class="{$component}" href="{$url|default:{Router::GetPathRootWeb()}}">
    <img src="{Plugin::GetWebPath('freelancer')}frontend/components/logo/img/logo.png">
</a>
{block 'nav_options' append}
    {$classes = "fl-nav"}
{/block}