<?php

    include('../lib/main.php');
    include('../templates/top.php');
?>

<form class="form-horizontal">
  <div class="form-group">
    <label for="exampleInputName2">Podaj pierwszą liczbę</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="0">
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Podaj drugą liczbę</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="0">
  </div>
  <button type="submit" class="btn btn-default">Pokaż największy wspólny dzielnik</button>
</form>


<?php

    include('../templates/bottom.php');
