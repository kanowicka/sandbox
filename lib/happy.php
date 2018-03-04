<?php

function calcDigits($num)
{
    $z = 0;
    foreach(str_split($num) as $n) {
        $z = $z + pow($n, 2);
    }
    return $z;
}

function isHappyNumber($y)
{
    while ($y != 1 && $y != 4) {
        $y = calcDigits($y);
    }

    return $y == 1;
}



$a = 1;
$b = 10;

$c = range($a , $b);

foreach ($c as $v){
    echo 'liczba: ' . $v . ' jest ' . (isHappyNumber($v) ? '':'nie') . 'szczęśliwa </br>';
}
//var_dump($c);


die();
