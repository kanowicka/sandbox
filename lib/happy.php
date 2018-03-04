<?php

$x = 19;

$y = $x;

while ($y != 1 && $y != 4) {
    $z = 0;

    echo $y . PHP_EOL;

    foreach(str_split($y) as $n) {
        $z = $z + pow($n, 2);
    }

    $y = $z;
}

echo 'Result: ' . $y;

// var_dump($y, $z);
die();


function isHappyNumber($num)
{
    return true;
}
