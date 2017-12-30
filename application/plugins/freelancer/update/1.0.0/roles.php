<?php

return array(
        'groups' => array(
            array('freelancer', 'Фрилансер'),
        ),
        'roles' => array(
            array('master', 'Master'),
            array('employer', 'Заказчик'),
            array('employer_pro', 'Заказчик pro'),
            array('master_pro', 'Master pro'),
            array('employer_profi', 'Заказчик profi'),
            array('master_profi', 'Master profi'),
        ),
        'permissions' => array(
            /*
             * Роль
             */
            array(
                'employer',
                'Заказчик',
                'msg_error' => 'plugin.freelancer.errors.is_employer',
                'group' => 'freelancer',
                'roles' => array('employer')),
            
             array(
                'master',
                'Мастер',
                'msg_error' => 'plugin.freelancer.errors.is_master',
                'group' => 'freelancer',
                'roles' => array('master')),
            
            array(
                'pro',
                'Про',
                'msg_error' => 'plugin.freelancer.errors.is_employer',
                'group' => 'freelancer',
                'roles' => array('employer_pro', 'master_pro')),
            
            array(
                'profi',
                'Профи',
                'msg_error' => 'plugin.freelancer.errors.is_employer',
                'group' => 'freelancer',
                'roles' => array('employer_profi', 'master_pro')),            
           
            
            /*
             * Специализация моя
             */
            array(
                'specialization',
                'Выбор специализации',
                'msg_error' => 'plugin.freelancer.errors.specialization',
                'group' => 'freelancer',
                'roles' => array('master')),
            
            /*
             *  Заявки
             */
            array(
                'create_order',
                'Создание заявок',
                'msg_error' => 'plugin.freelancer.errors.create_order',
                'group' => 'freelancer',
                'roles' => array('employer')),            
            array(
                'view_order',
                'Просмотр заявок',
                'msg_error' => 'plugin.freelancer.errors.view_order',
                'group' => 'freelancer',
                'roles' => array('user', 'guest')),
            array(
                'order_search',
                'Поиск по заявкам',
                'msg_error' => 'plugin.freelancer.errors.no_order_search',
                'group' => 'freelancer',
                'roles' => array('user')),
            
            /*
             * Отклики на заявку
             */
            array(
                'create_bid',
                'Создание отклика на заявку',
                'msg_error' => 'plugin.freelancer.errors.no_create_response',
                'group' => 'freelancer',
                'roles' => array('master')),
            array(
                'view_bids',
                'Просмотр откликов не разрешен',
                'msg_error' => 'plugin.freelancer.errors.no_view_response',
                'group' => 'freelancer',
                'roles' => array()),
            
            
            array(
                'view_master_contacts',
                'Просмотр контактов мастеров',
                'msg_error' => 'plugin.freelancer.errors.no_view_contacts_ankets',
                'group' => 'freelancer',
                'roles' => array('guest')),
            
            array(
                'view_employer_contacts',
                'Просмотр контактов мастеров',
                'msg_error' => 'plugin.freelancer.errors.no_view_contacts_ankets',
                'group' => 'freelancer',
                'roles' => array()),
            array(
                'create_portfolio',
                'Создание портфолио',
                'msg_error' => '',
                'group' => 'freelancer',
                'roles' => array()),
            
            array(
                'master_top',
                'Установка анкеты в топе выдачи',
                'msg_error' => '',
                'group' => 'freelancer',
                'roles' => array('master_pro')),
            array(
                'notify_orders',
                'Оповещение о новых заказах',
                'msg_error' => '',
                'group' => 'freelancer',
                'roles' => array('master_pro', 'master_profi', 'master')),
            
            array(
                'best_master',
                'Лучший мастера',
                'msg_error' => '',
                'group' => 'freelancer',
                'roles' => array('master_profi')),
            array(
                'create_response',
                'Установка анкеты в боке Лучшие мастера',
                'msg_error' => '',
                'group' => 'freelancer',
                'roles' => array('user')),
            array(
                'portfolio_video',
                'Видео портфолио',
                'msg_error' => '',
                'group' => 'freelancer',
                'roles' => array()),
            array(
                'sms_notify',
                'Оповещения на смс',
                'msg_error' => '',
                'group' => 'freelancer',
                'roles' => array('employer_pro','master_pro','employer_profi', 'master_profi')
                )
        ),
    );