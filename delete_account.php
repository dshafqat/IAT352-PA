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
          <?php if (isset($_SESSION['email'])) { ?>
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
   // get the current users name
     if (isset($_SESSION['name'])) {

      // assign it to variable
     $name = $_SESSION['name'];

     //delete from where the current users name is in the database

      $sql = "DELETE FROM users WHERE name='$name'";
      $sql2 = "DELETE FROM cart WHERE user_name='$name'";
      $result = $conn->query($sql);
      // if connection is succeful

    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
}   else {
  //Otherwise display error
        echo "Error deleting record: ";
}

}
?>

<br>
<br>
<br>

<!-- Redirect to logout.php after completing -->

		 <a href="logout.php" class="welcome-btn">Return</a>

		</div>

</div>


</body>

</html>


