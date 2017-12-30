{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
{$component = 'fl-order-fire'}
{component_define_params params=[ 'oOrder' ]}
{if $oOrder->getFire()}
    {component 'icon' icon="fire"}
{/if}