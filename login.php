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
            <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li>
              <div id="clock"></div>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <!-- Login Form-->
    <div class="container-fluid">
      <h2 class="text-center" id="H2">Login</h2>
    </div>

    <form class="form-horizontal" action="welcome.php" method="post">
      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="loginUsername" name="loginUsername" placeholder="Please Enter your Username">
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="loginPwd" name="loginPwd" placeholder="Please Enter your password">
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Login</button>
        </div>
      </div>
    </form>

    <!--Sign-up Form-->
    <div class="container-fluid">
      <h2 class="text-center" id="H2">Sign Up</h2>
      <p class="text-center">Please fill in some details about yourself below</p>
    </div>

    <form class="form-horizontal" action="welcome.php" method="post">
      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="sign-upUsername" name="sign-upUsername" placeholder="Please Enter a Username">
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="sign-upPwd" name="sign-upPwd" placeholder="Please Enter a password">
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="sign-upPwd2" name="sign-upPwd2" placeholder="Please Re-enter your password">
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Sign-Up</button>
        </div>
      </div>
    </form>


  </div>

</body>
