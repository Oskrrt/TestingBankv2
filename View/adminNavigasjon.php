<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TestingBank - Administrasjon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="view.css">
  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">TestingBank : Admin</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
                <a href="adminRegisterKunde.php">Registrer kunde</a>
            </li>
             <li>
                <a href="adminKunde.php">Endre kunde</a>
            </li>
            <li>
                <a href="adminRegisterKonto.php">Register konto</a>
            </li>
            <li>
                <a href="adminEndreKonto.php">Endre konto</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
              <li><a href="../API/loggUt.php">Logg ut</a></li>
          </ul>

        </div>
      </div>
    </div>

