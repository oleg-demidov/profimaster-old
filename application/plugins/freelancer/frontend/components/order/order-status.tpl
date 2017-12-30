{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-order-status'}
{component_define_params params=[ 'oOrder']}

{$aStatusIcons = [
        'new' => ['icon' => 'plus', 'title' => 'Новый' ],
        'publish' => ['icon' => 'eye','title' => "Опубликовано: {$oOrder->getDateCreate()}" ],
        'moderate' => ['icon' => 'eye-slash','title' => 'На модерации' ],
        'master_wait' => ['icon' => 'exclamation','title' => 'Ожидание запуска' ],
        'start' => ['icon' => 'play','title' => 'Запущен' ],
        'end' => ['icon' => 'check', 'title' => 'Завершен' ]
    ]}
    
{$aParamsIcon = [
    'icon' => $aStatusIcons[$oOrder->getStatus()]['icon'],
    'classes' => 'js-order-status',
    'attributes' => ['title' => {$aStatusIcons[$oOrder->getStatus()]['title']}]]}
    
{component 'icon' params=$aParamsIcon}