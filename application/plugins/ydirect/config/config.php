<?php
Config::Set('router.page.ads', 'PluginYdirect_ActionAds');
Config::Set('router.page.formkeywords', 'PluginYdirect_ActionFormkeywords');

$config['table']['ads'] = '___db.table.prefix___ydirect_ydirect_ads';
$config['table']['geo'] = '___db.table.prefix___ydirect_geo';
$config['table']['geo_target'] = '___db.table.prefix___ydirect_geo_target';

$config['redirect_oauth'] = 'https://oauth.yandex.ru/authorize';
$config['app'] = [
    'secret' => '3adaef2caab443389c6f190f2c892c6b',
    'id' => 'bcfec532a1b5450c8ee8526e3da2a178'
    ];
$config['oauth_url'] = 'https://oauth.yandex.ru/token';

$config['test_mode'] = 0; 

$config['yd_token'] = 'AQAAAAAD20xRAAQpjgt-Loeza0fQsWvajee704Y';//'AQAAAAAD20xRAAQpjmi5qytIXEkytk-fc6K7VnI';// AnWdbIn17e6p9Yf4
$config['yd_login'] = 'end-fin';
$config['yd_url_sanbox'] = 'https://api-sandbox.direct.yandex.com/json/v5/';
$config['yd_url'] = 'https://api.direct.yandex.com/json/v5/';
$config['campaigns'] = [
    'Notification' => [
        'SmsSettings' => [
             'Events' => ['MONEY_OUT'],
             'TimeFrom' => '10:00',
             'TimeTo'=>'21:00'
        ],
        'EmailSettings' => [
             'Email'=> 'end-fin@yandex.ru'
        ]
    ],
    'AverageCpc' => 10, // средняя цена клика
    'WeeklySpendLimit' => 1300 // недельный лимит
];

$config['default_bid'] = 1;

$config['debug_mode'] = 1;

$config['default_countries'] = [159];

$config['ygeo_beh'] = [
            'class'=>'PluginYdirect_ModuleGeo_BehaviorEntity',
            // Имя инпута (select) на форме, который содержит список категорий
            'form_field'                     => 'ygeo',
            // Автоматически брать текущую категорию из реквеста
            'form_fill_current_from_request' => true,
            // Возможность выбирать несколько категорий
            'multiple'                       => false,
            // Автоматическая валидация категорий (актуально при ORM)
            'validate_enable'                => true,
            // Минимальное количество категорий, доступное для выбора
            'validate_min'                   => 1,
            // Максимальное количество категорий, доступное для выбора
            'validate_max'                   => 5,
        ];

$config['ygeo_beh_module'] = [
            'class'=>'PluginYdirect_ModuleGeo_BehaviorModule',
        ];

$config['time_check_permissions'] = 1;
$config['category_type'] = 'specialization';

$config['html_keywords'] = ['limit' => 3];

$config['id_metrica'] = '46919250';
return $config;

