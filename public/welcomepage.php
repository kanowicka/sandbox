<?php

    include('../lib/main.php');
    include('../templates/top.php');

    echo "Witaj ". $_POST['name']. "<br />";
    echo "Twój numer ID to: ". saveNewUser($_POST['name'], $_POST['age'], $_POST['gender']). ".";
?>


<?php

    include('../templates/bottom.php');
