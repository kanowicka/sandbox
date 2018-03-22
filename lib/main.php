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
 * @return int
 * @throws Exception
 */
function saveNewUser($name, $age, $gender)
{
    $user = [
        'name' => $name,
        'age' => $age,
        'gender' => $gender,
    ];

    $id = generateID();

    if (saveUser($id, $user)) {
        return $id;
    }

    throw new Exception('Problem saving new user');

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

/**
 * @param  string $key
 * @param  array  $data
 * @return bool
 * @throws Exception
 */
function validateExistsAndNotEmpty($key, array $data)
{
    if (isset($data[$key]) && !empty($data[$key])){
        return true;
    } else {
        throw new Exception("Podaj ". $key);
    }
}

/**
 * @param  string $gender
 * @return string
 * @throws Exception
 */
function printGender($gender)
{
    if ($gender == 'm') {
        return 'Mężczyzna';
    } elseif ($gender == 'k') {
        return 'Kobieta';
    } else {
        throw new Exception('Nieznana płeć');
    }
}
