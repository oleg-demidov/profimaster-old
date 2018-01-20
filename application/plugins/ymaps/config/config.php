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
    ],
    'circle' => [
        'minRadius' => 500,
        'radius'=>300,
        'properties' => [
            'hintContent' => 'Щелкните, чтобы указать это место'
        ],
        'options' => [
            'draggable' => false,
            'fillOpacity' => 0.3,
            'fillColor' => '#5cc7ff',
            'strokeColor' => '#2f8bbc',
            'strokeOpacity'  => 0.3,
            'strokeWidth'  => 1
        ],
        'point' => [
            'preset' => 'islands#circleDotIcon', //https://tech.yandex.ru/maps/doc/jsapi/2.1/ref/reference/option.presetStorage-docpage/
            'iconColor' => '#2f8bbc'
        ]
    ],
    'point' => [
        'properties' => [
            'hintContent' => 'Вы здесь находитесь'
        ],
        'options' => [
            'preset' => 'islands#circleDotIcon', //https://tech.yandex.ru/maps/doc/jsapi/2.1/ref/reference/option.presetStorage-docpage/
            'iconColor' => '#2f8bbc'
        ]
    ]
];

return $config;