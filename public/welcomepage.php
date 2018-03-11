<?php
    include('../lib/main.php');

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        // 1
    } else {
        throw new Exception("Podaj imię");
    }
    if (isset($_POST['age']) && !empty($_POST['age'])){

    } else {
        throw new Exception("Podaj wiek");
    }
    if (isset($_POST['gender']) && !empty($_POST['gender'])){

    } else {
        throw new Exception("Podaj płeć");
    }

    $id = saveNewUser($_POST['name'], $_POST['age'], $_POST['gender']);

    include('../templates/top.php');
?>

<div class="col-md-12">
    <h3>Witaj <?=$_POST['name']?></h3>
    <div class="alert alert-success" role="alert">
        Twój numer ID to: <strong><?=$id?></strong>
    </div>
</div>

<?php

    include('../templates/bottom.php');
