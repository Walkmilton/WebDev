<?php

    session_start();

    $cookie_name = "enabled?";
    $cookie_value = "true";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


    $servername = "localhost";
    $usernameDB = "username";
    $passwordDB = "password";
    $dbname = "webdev";

    //Error reporting code - uncomment for debugging
    ini_set('display_errors',1);
    error_reporting(E_ALL);

    // Create connection
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * from poi";
		$result = $conn->query($sql);
?>

<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Linithgow Website</title>
	<meta name="description" content="Linlithgow">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js"></script>
	<script src="javascript.js"></script>
	<script src=widget.js></script>
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
						<li class="active"><a href="index.php">Linlithgow</a></li>
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




		<div class="container">
			<h1 class="text-center" id="H1">Linlithgow</h1>
			<center><img src="Images/Linlithgow-Palace.jpg" class="img-circle" alt="Linlithgow Palace" width="512x" ;height="512px"></center>
		</div>


		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<p class="text-center" id="blurb">Linlithgow is a town in West Lothian, Scotland. An ancient town it lies south of its two most prominent landmarks: Linlithgow palace and Linlithgow loch, and north of the union canal. Linlithgow’s patron saint is Saint Michael. The motto of Linlithgow
					is St. Michael is kind to strangers. You can find a statue of the saint holding the coat of arms on the high street. </p>
			</div>
			<div class="col-sm-3"></div>
		</div>


		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="container-fluid" id="todayInLinlithgow">
					<center><button type="button" class="btn btn-success" onclick="loadToday()">Click here to see what's on today in Linlithgow</button></center>
					<center>
						<div class="container-fluid" id="tilContent"></div>
					</center>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>

		<div class="row">
			<div class="col-xs-3"></div>
			<div class="col-xs-6">
				<div class="container-fluid">
					<p id="tableIntro" class="text-center">Here are some places of interest in Linlithgow</p>
					<table class="table table-hover table-responsive" id="poi">
						<thead>
							<tr>
								<th>Name</th>
								<th>Type</th>
								<th>Location</th>
								<th>Stars</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										echo "<tr><td>".$row["Name"]."</td><td>".$row["Type"]."</td><td>".$row["Location"]."</td><td>".$row["Stars"]."</td></tr>";
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-xs-3"></div>
		</div>


		<center>
			<div class="container-fluid" id="weather"></div>
		</center>

    <?php
      if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
      } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
      }
     ?>

	</div>




</body>

</html>
