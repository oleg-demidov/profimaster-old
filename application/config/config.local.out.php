<?php
/**
 * Настройки для локального сервера.
 * Для использования - переименовать файл в config.local.php
 * Именно в этом файле необходимо переопределять все настройки конфига
 */

/**
 * Настройка базы данных
 */
$config['db']['params']['host'] = 'localhost';
$config['db']['params']['port'] = '3306';
$config['db']['params']['user'] = 'a0016026_pm';
$config['db']['params']['pass'] = '2b50b5d070a7f3b99d89c27a5f3a1a04';
$config['db']['params']['type']   = 'mysqli';
$config['db']['params']['dbname'] = 'a0016026_pm';
$config['db']['table']['prefix'] = 'pm_';

/**
 * Настройки кеширования
 */
$config['sys']['cache']['use'] = false;               // использовать кеширование или нет
$config['sys']['cache']['type'] = 'file';             // тип кеширования: file, xcache и memory. memory использует мемкеш, xcache - использует XCache

/**
 * Параметры обработки css/js-файлов
 */
$config['module']['asset']['force_https'] = true; // При использовании https принудительно заменять http на https у путях до css/js
$config['module']['asset']['css']['merge'] = true; // указывает на необходимость слияния css файлов
$config['module']['asset']['js']['merge'] = true; // указывает на необходимость слияния js файлов


$config['module']['blog']['encrypt'] = '143db8c92751fe789db46de44a109977';
$config['module']['talk']['encrypt'] = 'b6f3ce0eb68e1599a51906584e52e0c7';
$config['module']['security']['hash'] = 'e3f0276f4b6be144aedd3be1a96077d2';
$config['db']['tables']['engine'] = 'InnoDB';
$config['path']['root']['web'] = 'http://profimaster.kz';
$config['path']['offset_request_url'] = 0;

$config['module']['validate']['recaptcha']= array(
    'site_key' => '6Lff3jAUAAAAAMxuUpJjRNxeW9diTbIqiHgE1pP5', // Ключ
    'secret_key' => '6Lff3jAUAAAAAIOW2A54AtcepDPXNH34HkJGtgK7', // Секретный ключ
    'use_ip' => false, // Использовать при валидации IP адрес клиента
);
return $config;