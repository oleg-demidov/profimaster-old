<?php

//Config::Set('router.page.send', 'PluginSmsc_ActionSend');

$config['urls'] = [
    'send' => 'https://smsc.kz/sys/send.php', //?login=<login>&psw=<password>&phones=<phones>&mes=<message>',
    'get_price' => 'https://smsc.kz/sys/send.php' //?login=<login>&psw=<password>&phones=<phones>&mes=<message>&cost=1'
];

$config['user'] = [
    'login' => 'Olezhik',
    'psw' => '87054503719'
];
return $config;