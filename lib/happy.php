<?php

/**
 * @param  int $num
 * @return int
 */
function calcDigits($num)
{
    $z = 0;
    foreach(str_split($num) as $n) {
        $z = $z + pow($n, 2);
    }
    return $z;
}

/**
 * @param int $y
 * @return bool
 */
function isHappyNumber($y)
{
    while ($y != 1 && $y != 4) {
        $y = calcDigits($y);
    }

    return $y == 1;
}

/**
 * @param  int $start
 * @param  int $end
 * @return array
 */
function happyRange($start, $end)
{
    $rtn = [];
    foreach (range($start , $end) as $v){
        $rtn[$v] = isHappyNumber($v);
    }
    return $rtn;
}
