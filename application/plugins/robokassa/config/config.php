<?php

$config['$root$']['router']['page']['robopay'] = 'PluginRobokassa_ActionPayment';

$config['shop'] = [
    'login' => 'profimaster.kz',
    'pass1' => 'En8HFCGw64NrWk2MdtV1',
    'pass2' => 'agjO6fC2cy7hB94hELpq'
];
$config['test'] = [
    'login' => 'profimaster.kz',
    'pass1' => 'Zjjd7kGo4dGkya8tb9N0',
    'pass2' => 'UgCDrsHt7ikKT7R2D9r4'
];

$config['mode'] = 'shop';
$config['culture'] = 'ru';
$config['currency'] = 'KZT';

$config['url'] = 'https://merchant.roboxchange.com/Index.aspx';

return $config;
?>