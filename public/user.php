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

<?php

if (isset($x)) {
    echo ('<h3>Twoje dane:</h3>');
    foreach (readUser($id) as $key => $value) {
        echo($key . ': ' . $value . '<br>');
    }
}

    include('../templates/bottom.php');
