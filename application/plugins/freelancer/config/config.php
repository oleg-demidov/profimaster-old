<?php

Config::Set('router.page.index', 'PluginFreelancer_ActionFreelancer');
Config::Set('router.page.community', 'ActionIndex');

Config::Set('router.page.fauth', 'PluginFreelancer_ActionFauth');
Config::Set('router.page.r', 'PluginFreelancer_ActionR');
Config::Set('router.page.info', 'PluginFreelancer_ActionInfo');
Config::Set('router.page.order', 'PluginFreelancer_ActionOrder');
Config::Set('router.page.freelancer', 'PluginFreelancer_ActionFreelancer');
Config::Set('router.page.user', 'PluginFreelancer_ActionUser');
Config::Set('router.page.manager', 'PluginFreelancer_ActionManager');
Config::Set('router.page.portfolio', 'PluginFreelancer_ActionPortfolio');
Config::Set('router.page.pay', 'PluginFreelancer_ActionPay');
Config::Set('module.comment.vote_target_allow', array_merge(Config::Get('module.comment.vote_target_allow'),['order']));




//Config::Set('block.rule_profile', []);
Config::Set('block.rule_index_blog', array(
    'action' => array(
        'community','feed','index',
        'blog' => array('{topics}', '{blog}')
    ),
    'blocks' => array(
        'left' => array(
            'communitySpecialization' => array('params' => array('plugin' => 'freelancer'),'priority' => 300),
            'activityRecent' => array('priority' => 100),
            'topicsTags'   => array('priority' => 50),
            'blogs'  => array('params' => array('plugin' => 'freelancer'), 'priority' => 200)
        )
    ),
    'clear'  => false,
));

Config::Set('block.user_profile', array(
    'action' => array(
        'user' => ['{profile}'],
        'manager' => ['{profile}']
        ),
    'blocks' => array(
        'left' => array(
            'component@freelancer:user.block.photo'   => array('priority' => 100),
           // 'component@freelancer:user.block.actions' => array('priority' => 50),
            'component@freelancer:user.block.contacts' => array('priority' => 49),
            'ordersNews'    => array('priority' => 25, 'params' => array('plugin' => 'freelancer'))
        )
    ),
    'clear'  => true
));

Config::Set('block.employer', array(
    'action' => array('order' => ['{view}']),
    'blocks' => array(
        'left' => array(
            'component@freelancer:user.block.employer'   => array('priority' => 100),
            'ordersNews'    => array('priority' => 25, 'params' => array('plugin' => 'freelancer'))
        )
    ),
    'clear'  => true
));

Config::Set('block.search', array(
    'action' => array('user' => ['search']),
    'blocks' => array(
        'left' => array(
            'bestMasters'   => array('priority' => 25, 'params' => array('plugin' => 'freelancer')),
        )
    ),
    'clear'  => true
));

Config::Set('block.ref', array(
    'action' => array('user' => ['search'],'order' => ['search']),
    'blocks' => array(
        'left' => array(
           'component@freelancer:manager.block.ref.vert'   => array('priority' => 100),
        )
    ),
    'clear'  => true
));

Config::Set('block.ref2', array(
    'action' => array('index'),
    'blocks' => array(
        'top' => array(
           'component@freelancer:manager.block.ref.goriz'   => array('priority' => 100),
        )
    ),
    'clear'  => true
));

Config::Set('block.rule_blog', array(
    'action' => array('blog' => array('{blog}')),
    'blocks' => array(
        'left' => array(
            'component@blog.block.photo'   => array('priority' => 300),
            'component@blog.block.actions' => array('priority' => 300),
            'component@blog.block.users'   => array('priority' => 300),
            'component@blog.block.admins'  => array('priority' => 300)
        )
    ),
    'clear'  => true
));

Config::Set('block.rule_blogs', array(
    'action' => array('blogs'),
    'blocks' => array(
        'left' => array(
            'component@blog.block.add' => array('priority' => 100),
            'blogsSearch'              => array('priority' => 50, 'params' => array('plugin' => 'freelancer'))
        )
    ),
));


$config['table']=[
    'order' => '___db.table.prefix___freelancer_order',
    'bid' => '___db.table.prefix___freelancer_order_bid',
    'response' => '___db.table.prefix___freelancer_order_response'
];

$config['rating'] = [
    'offset' => [
        'create_order' => 0.5,
        'create_bid' => 0.1,
        'choosen_master' => 0.5,
        'create_response' => 0.2,
        'response' => [-1, -0.5, 0, 0.5, 1],
        'create_portfolio' => 0.3,
        'profile_text' => [
            200 => 0.2,
            
            500 => 0.5,
            1000 => 1,
            1500 => 1.5,
            2000 => 2,
            3000 => 3            
        ],
        'profile_sex' => 0.2,
        'online' => [
            'timeoff' => (60*60*3),
            'bid' => 0.1],
        'profile_avatar' => 0.5,
        'profile_birthday' => 0.2,
        'mail' => 0.2                                  
    ]
];

$config['poisk'] = [
    'per_page' => 10,
    'count_page_line' => 2,
    'geo' => [
        'countries' => ['KZ']
        ],
    'item_desc_words' => 20
    ];
    
$config['menu'] = [
  'orders_pos' => 2,
  'masters_pos' => 5
];

$config['response'] = [
    'per_page' => 10,
    'pagination'=>[
        'pages_count' => 5
        ],
    'max_level' => 1
];

$config['sms'] = [
    'max_count_reg' => 2,
    'urls' => [
        'send' => 'https://smsc.kz/sys/send.php', //?login=<login>&psw=<password>&phones=<phones>&mes=<message>',
        'get_price' => 'https://smsc.kz/sys/send.php' //?login=<login>&psw=<password>&phones=<phones>&mes=<message>&cost=1'
    ],
    'user' => [
        'login' => 'Olezhik',
        'psw' => '87054503719'
    ]
];
$config['market'] = [
    'price_cof' => 0.005559,
    'price_cof_limit' => 60,
    'str_currency' => 'тг.'
];
$config['manager'] = [
    'precent' => 20
];

return $config;