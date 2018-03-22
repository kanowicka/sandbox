<?php
    include('../lib/main.php');
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        if (!is_numeric($id)) {
            throw new Exception('Podaj ID!');
        }
        $x = readUser($id);
    }

    include('../templates/top.php');
?>
<form class="form-horizontal" method="get">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Podaj swoje ID</label>
    <div class="col-sm-10">
      <input type="numbers" class="form-control" id="inputEmail3" placeholder="ID" name="id">
    </div>
  </div>
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
     <button type="submit" class="btn btn-default">Pokaż użytkownika</button>
   </div>
 </div>
</form>

<dl class="dl-horizontal">
  <dt>Imię i nazwisko:</dt>
  <dd><?=$x['name']?></dd>
  <dt>Wiek:</dt>
  <dd><?=$x['age']?></dd>
  <dt>Płeć:</dt>
  <dd><?=printGender($x['gender'])?></dd>
</dl>

<?php

    include('../templates/bottom.php');
