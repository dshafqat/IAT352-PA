
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Welcome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/main.css"> 
  <link rel="stylesheet" href="css/normalize.css">    
  <link rel="stylesheet" href="css/layout.css"> 

</head>

<body>



  <?php
  require('config.php'); //connection to db code
  include("nonactive_session_check.php");
    ?>

<div class="container-fluid">

		<div class="col-md-12" align="center">
 
		 <h1 class="display-3">Welcome to your account, <?php echo $_SESSION['name']; ?>!</h1>
		 <a href="index.php" class="welcome-btn">Shop Now</a>
     <a href="logout.php" class="welcome-btn">log out</a>

		</div>

</div>


</body>

</html>