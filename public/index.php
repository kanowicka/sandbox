<?php

include('../lib/happy.php');

if (isset($_POST['number']) && !empty($_POST['number'])) {
    $number = $_POST['number'];

    if (!is_numeric($number)) {
        die('Podaj liczbe');
    }

    $isHappy = isHappyNumber($number);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sandbox</title>
    <meta name="description" content="">
    <meta name="author" content="Karolina Szpera">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/main.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="/">Home</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Sandbox</h3>
      </div>
        <div class="row">
            <!-- CONTENT START -->
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
            ?>
            <!-- CONTENT STOP -->
        </div>
      <footer class="footer">
        <p>&copy; 2018 Karolina Szpera</p>
      </footer>
    </div> <!-- /container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
