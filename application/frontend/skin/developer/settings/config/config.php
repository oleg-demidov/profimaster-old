<?php

$config = array();

/**
 * Тип сетки
 *
 * fluid - резина
 * fixed - фиксированная ширина
 */
$config['view']['grid']['type'] = 'fixed';

// Настройки резины
$config['view']['grid']['fluid_min_width'] = '320px';
$config['view']['grid']['fluid_max_width'] = '1200px';

// Настройки фиксированная ширина
$config['view']['grid']['fixed_width'] = '1100px';

// Показывать баннер с лого и описанием или нет
$config['view']['layout_show_banner'] = false;

// Подключение скриптов шаблона
$config['head']['template']['js'] = array(
	'___path.skin.assets.web___/js/init.js'
);

// Подключение стилей шаблона
$config['head']['template']['css'] = array(
	"___path.skin.assets.web___/css/layout.css",
	"___path.skin.assets.web___/css/print.css"
);

// Подключение темы
if (Config::Get('view.theme')) {
	$config['head']['template']['css'][] = "___path.skin.web___/themes/___view.theme___/style.css";
}

/**
 * SEO
 */

// Тег используемый для заголовков топиков
$config['view']['seo']['topic_heading'] = 'h1';
$config['view']['seo']['topic_heading_list'] = 'h2';

$config['block']['search'] = array(
    'action' => array('masters'),
    'blocks' => array(
        'left' => array(
            'poisk' => array('priority' => 50, 'params' => array('plugin' => 'freelancer'))
        )
    ),
    'clear'  => true
);

return $config;