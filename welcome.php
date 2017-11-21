<?php
// Start the session
session_start();

if(!isset($_SESSION['username'])){
  header("Location:login.php");
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

  //Add items
  $name = test_input($_POST['name']);
  $type = test_input($_POST['type']);
  $location = test_input($_POST['location']);
  $stars = test_input($_POST['stars']);


  if(isset($_POST['submit'])) {
    if ($_SESSION['username'] == "Admin"){
      $sqlAdd = "INSERT INTO poi (Name, Type, Location, Stars) VALUES ('$name', '$type', '$location', '$stars')";

      if ($conn->query($sqlAdd) === true) {
        $completedAdd = true;
      }
      } else {
        $notAdmin = true;
      }
    }

    //edit items
    $searchName = test_input($_POST['editSearch']);
    $newName = test_input($_POST['editName']);
    $newType = test_input($_POST['editType']);
    $newLocation = test_input($_POST['editLocation']);
    $newStars = test_input($_POST['editStars']);

  if(isset($_POST['Search'])) {
    if ($_SESSION['username'] == "Admin"){
      $sqlEdit = "UPDATE poi SET Name='$newName', Type='$newType', Location='$newLocation', Stars='$newStars' WHERE Name='$searchName'";

      if ($conn->query($sqlEdit) === true) {
        $completedEdit = true;
      }
    } else {
      $notAdmin = true;
    }
  }

  //Deleting items
  $delete = test_input($_POST['delete']);

if(isset($_POST['Delete'])) {
  if ($_SESSION['username'] == "Admin"){
    $sqlDelete = "DELETE FROM poi WHERE Name='$delete'";

    if ($conn->query($sqlDelete) === true) {
      $completedDelete = true;
    }
  } else {
    $notAdmin = true;
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
            <li class="active"><a href="welcome.php"><span class="glyphicon glyphicon-user"></span> User Page</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li>
              <div id="clock"></div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php

    if((isset($_POST['submit']) || isset($_POST['Search']) || isset($_POST['Delete'])) && ($notAdmin)) {
      echo '<div class="alert alert-danger"<strong>Alert:</strong> You do not have sufficient permissions to edit the homepage. Please login as the administrator and try again </div>';
    }

    ?>

    <div class="container-fluid">
      <h2 id="H2" class="text-center">User Page</h2>
    </div>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <div class="container-fluid">
          <h3 id="welcome" class="text-center">Welcome <?php echo $_SESSION["username"];?></h3>

          <p class="text-center">Below you can add places to the table on the homepage</p>
        </div>
      </div>
      <div class="col-sm-4"></div>
    </div>



    <!--Adding stuff to database-->
    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="name" placeholder="Please Enter the Name of the place" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="type" placeholder="Please Enter the Type of the Place" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="location" placeholder="Please Enter the location of the Place" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="stars" placeholder="Please Enter the amount of stars for the Place" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default" name="submit">Add</button>
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <div class="container-fluid">
          <?php
          if(isset($_POST['submit'])) {
            if ($completedAdd) {
              echo '<p class="text-center">Entries have been added to the table</p>';
            } else {
              echo '<p class="text-center">Error</p>';
            }
          }
          ?>
        </div>
      </div>
      <div class="col-sm-4"></div>
    </div>


<!--Editing the database-->
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <div class="container-fluid">
      <p class="text-center">Below you can edit the table on the homepage. Search for an entry by name, and then enter the new data.</p>
    </div>
  </div>
  <div class="col-sm-4"></div>
</div>


    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="editSearch" placeholder="Please Enter the Name of the place you wish to edit" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="editName" placeholder="Please Enter the New Name of the Place" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="editType" placeholder="Please Enter the New Type of the Place" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="editLocation" placeholder="Please Enter the New location of the Place" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="editStars" placeholder="Please Enter the new amount of stars for the Place" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default" name="Search">Edit</button>
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <div class="container-fluid">
          <?php
          if(isset($_POST['Search'])) {
            if ($completedEdit) {
              echo '<p class="text-center">Entries have been edited in the table</p>';
            } else {
              echo '<p class="text-center">Error</p>';
            }
          }
          ?>
        </div>
      </div>
      <div class="col-sm-4"></div>
    </div>


<!--Deleting from the database-->
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <div class="container-fluid">
      <p class="text-center">Below you can edit the table on the homepage. Search for an entry by name, and then hit delete to delete that entry.</p>
    </div>
  </div>
  <div class="col-sm-4"></div>
</div>


    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="delete" placeholder="Please Enter the Name of the place you wish to delete" required>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default" name="Delete">Delete</button>
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <div class="container-fluid">
          <?php
          if(isset($_POST['Delete'])) {
            if ($completedDelete) {
              echo '<p class="text-center">Entries have been deleted from the table</p>';
            } else {
              echo '<p class="text-center">Error</p>';
            }
          }
          ?>
        </div>
      </div>
      <div class="col-sm-4"></div>
    </div>

<!--logout button-->
    <form action="script.php">
      <div class="row" id="bottom">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="container-fluid" id='bottom'>
              <button type="submit" class="btn btn-danger btn-block">Logout</button>
          </div>
        </div>
        <div class="col-sm-4"></div>
      </div>
    </form>




</div>
</body>

</html>
