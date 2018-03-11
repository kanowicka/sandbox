<?php
    include('../lib/main.php');
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
    include('../templates/bottom.php');
