<?php

include('../lib/happy.php');

set_exception_handler(function(Exception $e) {
    include('../templates/top.php');
    echo('<div class="alert alert-danger" role="alert"><h4>Błąd!</h4>' . $e->getMessage() . '</div>');
    include('../templates/bottom.php');
    die();
});
