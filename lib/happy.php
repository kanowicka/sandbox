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
    return end(happyArray($y)) == 1;
}

/**
 * @param  int $f
 * @return array
 */
function happyArray($f)
{
    $d = [];
    while ($f != 1 && $f != 4) {
        $f = calcDigits($f);
        $d[] = $f;
    }
    return $d;
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
