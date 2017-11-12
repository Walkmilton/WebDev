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

Welcome <?php echo $_POST["loginUsername"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>


</body>

</html>
