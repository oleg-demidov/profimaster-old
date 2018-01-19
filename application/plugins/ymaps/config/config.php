<?php

Config::Set('router.page.ymaps', 'PluginYmaps_ActionYmaps');

$config['load_ymaps_actions'] = [
    'settings'
];
$config['options'] = [
    'code' => "KZ",
    'results' => 5,
    'center' => [48.499534, 74.382505],
    'zoom' => 5,
    'geocoder' => [
        'results'=>2000,
        'boundedBy'=>[[41.450983, 46.115502],[55.669800, 87.336205]],
        'strictBounds'=> true
    ]
];

return $config;