<?php

    include('../lib/main.php');

    if (isset($_POST['words']) && !empty($_POST['words'])) {
        $word = $_POST['words'];
    }

    include('../templates/top.php');
?>

<h2>Pole tekstowe</h2>

<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Słowa</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="words"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sprawdz</button>
    </div>
  </div>
</form>


<?php
    if (isset($word)) {
        echo ('<h2>Wynik</h2>');
        foreach (countWords($word) as $key => $value) {
            echo($key . ': ' . $value . '<br>');
        }
    }

    include('../templates/bottom.php');
