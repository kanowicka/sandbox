<?php

    include('../lib/main.php');
    include('../templates/top.php');
?>

<h2>Formularz</h2>

<form class="form-horizontal">
  <div class="form-group">
    <label for="exampleInputName2">Imię i nazwisko</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jan Kowalski">
  </div>
  <div class="form-group">
    <label for="age">Wiek</label>
    <input type="number" class="form-control" id="age" placeholder="18">
  </div>
  <div class="form-group">
    <label for="gender">Płeć</label>
    <input type="text" class="form-control" id="gender" placeholder="Kobieta/Mężczyzna">
  </div>
  <button type="submit" class="btn btn-default">Wyślij</button>
</form>

<?php

    include('../templates/bottom.php');
