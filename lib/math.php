<?php

/**
 * @param  int $a
 * @param  int $b
 * @return int
 * @throws Exception
 */
function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function gcd2($a, $b)
{
    $r = $a % $b;

    if ($r != 0) {
        return gcd2($b, $r);
    } else {
        return $b;
    }
}
