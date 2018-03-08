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

/**
 * @param  int $id
 * @param  array  $user
 * @return bool
 */
function saveUser($id, array $user)
{
    return (bool) file_put_contents(getUserFilePath($id), json_encode($user));
}

/**
 * @param  string $name
 * @param  int $age
 * @param  string $gender
 * @return bool
 */
function saveNewUser($name, $age, $gender)
{
    $user = [
        'name' => $name,
        'age' => $age,
        'gender' => $gender,
    ];

    $id = generateID();

    return saveUser($id, $user);
}

/**
 * @param  int $id
 * @return array
 */
function readUser($id)
{
    return json_decode(file_get_contents(getUserFilePath($id)), true);
}

/**
 * @param  int $id
 * @return string
 */
function getUserFilePath($id)
{
    return '../evidence/' . $id . '.json';
}
