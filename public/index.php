<?php

    include('../lib/happy.php');

    if (isset($_POST['number']) && !empty($_POST['number'])) {
        $number = $_POST['number'];

        if (!is_numeric($number)) {
            die('Podaj liczbe');
        }

        $isHappy = isHappyNumber($number);
    }

    include('../templates/top.php');

?>

<h2>Formularz</h2>

<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Liczba</label>
    <div class="col-sm-10">
      <input class="form-control" id="inputEmail3" placeholder="0" name="number">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sprawdz</button>
    </div>
  </div>
</form>

<?php
    if (isset($number)) {
        echo ('<h2>Wynik</h2>');
        if ($isHappy == true) {
            echo ('<div class="alert alert-success" role="alert">' . $number . ' jest szczęśliwa!</div>');
        } else {
            echo ('<div class="alert alert-danger" role="alert">Niestety ' . $number . ' nie jest.</div>');
        }
        echo '<h3>Sumy</h3><pre>';
        foreach (happyArray($number) as $num) {
            echo($num . PHP_EOL);
        }
        echo '</pre><h3>Zakres</h3><pre>';
        foreach (happyRange(1, $number) as $key => $value) {
            if ($value == true) {
                echo('Liczba ' . $key . ' jest szczesliwa.' . PHP_EOL);
            }
        }
        echo '</pre>';
    }

    include('../templates/bottom.php');
