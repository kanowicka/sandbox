<?php

    include('../lib/main.php');
    include('../templates/top.php');
?>

<div class="col-md-12">
    <h2>Formularz</h2>

    <form action="welcomepage.php" method="post">
      <div class="form-group">
        <label for="name">Imię i nazwisko</label>
        <input type="text" class="form-control" id="name" placeholder="Jan Kowalski" name="name">
      </div>
      <div class="form-group">
        <label for="age">Wiek</label>
        <input type="number" class="form-control" id="age" placeholder="1-99" name="age">
      </div>
      <div class="form-group">
        <label for="gender">Płeć</label>
        <select class="form-control" name="gender">
          <option value="k">Kobieta</option>
          <option value="m">Mężczyzna</option>
        </select>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-default">Wyślij</button>
      </div>
    </form>
</div>

<?php

    include('../templates/bottom.php');
