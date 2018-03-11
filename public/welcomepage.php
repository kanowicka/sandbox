<?php
    include('../lib/main.php');

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
