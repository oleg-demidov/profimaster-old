<?php
/**
 * num2word($sDays, ['день', 'дня', 'дней'])
 * @param type $num число
 * @param type $words массив слов
 * @return string
 */
function num2word($num, $words)
{
    $num = $num % 100;
    if ($num > 19) {
        $num = $num % 10;
    }
    switch ($num) {
        case 1: {
            return($words[0]);
        }
        case 2: case 3: case 4: {
            return($words[1]);
        } 
        default: {
            return($words[2]);
        }
    }
}
