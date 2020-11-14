<?php
// Start the session
session_start();
?>
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
<header>
    <nav>
      <div class="logo">  
        <img src="img/logo.png" alt="Brand design / Logo">
      </div>

      <div class="menu">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="index.php">Menu</a></li>
          <li><a href="login_successful.php">Account</a></li>
          <?php if (isset($_SESSION['name'])) { ?>
            <li><a href="cart.php">Cart</a></li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>
<body>



<div class="container-fluid">

		<div class="col-md-12" align="center">
 
    <!-- Empty variables check-->
      <?php
        
      require('config.php');
      // include("active_session_check.php");
     if (isset($_GET['user'])) {
     $name = $_GET['user'];
      $sql = "DELETE FROM users WHERE name='$name'";
    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
}   else {
        echo "Error deleting record: ";
}

}
?>

<br>
<br>
<br>
		 <a href="logout.php" class="welcome-btn">Return</a>

		</div>

</div>


</body>

</html>


