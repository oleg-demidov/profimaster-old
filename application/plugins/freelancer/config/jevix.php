<?php

Config::Set('jevix', array_merge(Config::Get('jevix'), 
    array(
        'clear' => array(
            // Разрешённые теги
            'cfgAllowTags'          => array(
                
            )  
        )
    )
));
