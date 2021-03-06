<?php

    session_start();

    if(isset($_SESSION['username'])){
      header("Location:welcome.php");
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $servername = "localhost";
    $usernameDB = "username";
    $passwordDB = "password";
    $dbname = "webdev";

    //Error reporting code - uncomment for debugging
    //ini_set('display_errors',1);
    //error_reporting(E_ALL);

    // Create connection
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $username = test_input($_POST['loginUsername']);
    $password = test_input($_POST['loginPwd']);

  

    if(isset($_POST['login'])) {

      $sqlCheck = "SELECT * FROM `users` WHERE Username='$username' AND Password='$password'";
      $resultCheck = $conn->query($sqlCheck);

      if ($resultCheck->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location:welcome.php");
        exit;

      } else {
        $Incorrect = true;
      }
    }

    $newUsername = test_input($_POST['sign-upUsername']);
    $newPassword1 = test_input($_POST['sign-upPwd']);
    $newPassword2 = test_input($_POST['sign-upPwd2']);

    if(isset($_POST['sign-up'])) {

      $sqlUCheck = "SELECT Username FROM `users` WHERE Username='$newUsername'";
      $resultUCheck = $conn->query($sqlUCheck);

      if ($resultUCheck->num_rows == 0) {

        if($newPassword1 == $newPassword2) {
          $sqlAdd = "INSERT INTO `users` (Username, Password) VALUES ('$newUsername', '$newPassword1')";
        //  $resultAdd = $conn->query($sqlAdd);

          if ($conn->query($sqlAdd) === TRUE) {
            $_SESSION["username"] = $newUsername;
            header( 'Location: welcome.php');
            exit;
          } else {
              echo "Error: " . $conn->error;
          }
        } else {
          $notMatch = true;
        }
      } else {
        $taken = true;
      }
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
            <li><a href="index.php">Linlithgow</a></li>
            <li><a href="location.html">Location</a></li>
            <li><a href="history.html">Town History</a></li>
            <li><a href="events.html">Town Events</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="welcome.php"><span class="glyphicon glyphicon-user"></span> User Page</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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

    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="loginUsername" name="loginUsername" placeholder="Please Enter your Username" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="loginPwd" name="loginPwd" placeholder="Please Enter your password" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default" name="login">Login</button>
        </div>
      </div>
    </form>



    <!--Sign-up Form-->
    <div class="container-fluid">
      <h2 class="text-center" id="H2">Sign Up</h2>
      <p class="text-center">Please fill in some details about yourself below</p>
    </div>

    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="sign-upUsername" name="sign-upUsername" placeholder="Please Enter a Username" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="sign-upPwd" name="sign-upPwd" placeholder="Please Enter a password" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="sign-upPwd2" name="sign-upPwd2" placeholder="Please Re-enter your password" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default" name="sign-up">Sign-Up</button>
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col-xs-2"></div>
      <div class="col-xs-8">
        <?php
          if ($Incorrect) {
            echo '<p id="warning" class="text-center">Incorrect username or password</p>';
          }
          if ($notMatch) {
            echo '<p id="warning" class="text-center">The two passwords you have entered do not match.</p>';
          }
          if ($taken) {
            echo '<p id="warning" class="text-center">This username is already taken</p>';
          }
         ?>
      </div>
      <div class="col-xs-2"></div>
    </div>

  </div>

</body>
