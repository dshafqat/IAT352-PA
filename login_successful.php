<?php session_start(); ?>
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
          <li><a href="sign-in.php">Account</a></li>
          <?php if (isset($_SESSION['email'])) { ?>
            <li><a href="cart.php">Cart</a></li>
          <?php } ?>
        </ul>
      </div>

    </nav>
  </header>

<body>



  <?php
  require('config.php'); //connection to db code
  include("nonactive_session_check.php");
    ?>

<div class="container-fluid">

  <?php $name = $_SESSION['name'];?>

		<div class="col-md-12" align="center">

      <!-- buttons redirecting to different pages -->
  		 <h1 class="display-3">Welcome to your account, <?php echo $name; ?>!</h1>
  		 <a href="index.php" class="welcome-btn">Shop Now</a>
       <a href="logout.php" class="welcome-btn">log out</a>
       <a href="delete_account.php?user=<?php echo $_SESSION['email'];?>" class="welcome-btn">Delete account</a>

        <a href="changePreference.php?user=<?php echo $_SESSION['email'];?>" class="welcome-btn">Change Preference</a>



		</div>

</div>


</body>

</html>