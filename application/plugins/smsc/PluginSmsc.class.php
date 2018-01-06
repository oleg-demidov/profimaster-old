<?php
/**
 * @author Oleg Demidov
 *
 */

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

class PluginSmsc extends Plugin
{


    
    public function Init()
    {
    
    }

    public function Activate()
    {
        return true;
    }

    public function Deactivate()
    {
        return true;
    }
}