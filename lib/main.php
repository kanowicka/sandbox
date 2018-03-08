<?php

include('../lib/happy.php');

set_exception_handler(function(Exception $e) {
    include('../templates/top.php');
    echo('<div class="alert alert-danger" role="alert"><h4>Błąd!</h4>' . $e->getMessage() . '</div>');
    include('../templates/bottom.php');
    die();
});

/**
 * @param  string $text
 * @return array
 */
function countWords($text)
{
    $ar = [];

    foreach (explode(' ', $text) as $value) {

        $value = str_replace('.', '', strtolower($value));
        $ar[$value] = $ar[$value] + 1;

    }

    return $ar;
}

/**
 * @return int
 */
function generateID()
{
    return time();
}
