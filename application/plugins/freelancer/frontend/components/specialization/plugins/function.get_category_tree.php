<?php
/*
 * LiveStreet CMS
 * Copyright © 2013 OOO "ЛС-СОФТ"
 *
 * ------------------------------------------------------
 *
 * Official site: www.livestreetcms.com
 * Contact e-mail: office@livestreetcms.com
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * ------------------------------------------------------
 *
 * @link http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author Maxim Mzhelskiy <rus.engine@gmail.com>
 *
 */

/**
 * Получает значение поля по его имени
 *
 * @param  array  $form  Массив с данными формы
 * @param  string $name  Атрибут name поля в формате item[subitem][...]
 * @return string        Значение поля
 *
 * @author  Denis Shakhov
 */
function smarty_function_get_category_tree($aParams, &$oSmarty)
{
    
    /*function GetMenuItems($oSpecialization) {
        $aSpecChilds = $oSpecialization->getChildren();
    
        $aItemsMenu = [];
        foreach ($aSpecChilds as $oSpecChild){
            $aItemsMenu[] = GetMenuItems($oSpecChild);
        }
    
        return ['text' => $oSpecialization->getTitle(), 'menu' => [ 'items' => $aItemsMenu] ];
    }*/
    return 5;
}