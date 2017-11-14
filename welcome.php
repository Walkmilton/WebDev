<?php
// Start the session
session_start();

if(!isset($_SESSION['username'])){
  header("Location:login.php");
  }
?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="description" content="Login page for Linlithgow Website">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="javascript.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body onload="startTime()">
  <div class="container" id="background">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class "navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Linlithgow</a></li>
            <li><a href="location.html">Location</a></li>
            <li><a href="history.html">Town History</a></li>
            <li><a href="events.html">Town Events</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="welcome.php"><span class="glyphicon glyphicon-user"></span> User Page</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li>
              <div id="clock"></div>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <div class="container-fluid">
      <h2 id="H2" class="text-center">User Page</h2>
    </div>

    <div class="row">
      <div class="col-xs-4"></div>
      <div class="col-xs-4">
        <div class="container-fluid">
          <h3 id="welcome" class="text-center">Welcome <?php echo $_SESSION["username"];?></h3>
        </div>
      </div>
      <div class="col-xs-4"></div>
    </div>

    <form action="script.php">
      <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
          <div class="container-fluid">
              <button type="submit" class="btn btn-danger btn-block">Logout</button>
          </div>
        </div>
        <div class="col-xs-4"></div>
      </div>
    </form>




</div>
</body>

</html>
