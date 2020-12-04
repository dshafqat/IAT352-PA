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
     if (isset($_SESSION['email'])) {

     $email = $_SESSION['email'];

      $sql = "DELETE FROM preference WHERE email='$email'";

      $result = $conn->query($sql);

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

<h2> Choose a new preference </h2>

  
    <?php 

          include 'config.php';

          $choice = "";
          $tea = "";
          $price_r = "";
          $product_image = "";
          $detail_image = "";
          $information = "";
          $email = "";


          $sqla = $conn->query("SELECT product_name FROM products");

   ?>


   <form>

      <select id="" name="choice">

        <?php 

        while($rows = $sqla->fetch_assoc())
        {

        $product_name = $rows['product_name'];
        

         echo" <option value='$product_name'>$product_name</option>";
        }
          ?>
        </select>


        <input type="submit" name="submit" value="Submit" />

      </form>
		 
		</div>

</div>









  <?php
  
require('config.php');

if (isset($_SESSION['email'])) {


$query = "SELECT * FROM products";

$choice = $_REQUEST["choice"];
$email = $_SESSION['email'];


$result = $conn->query($query);

while($row = $result->fetch_assoc()) {

if ($row["product_name"] == $choice) {
  
$tea = $row['tea'];
$price_r = $row['price_r'];
$product_image = $row['product_image'];
$detail_image = $row['detail_image'];
$information = $row['information'];


}}









// Open connection to the $file in writing mode


  // After form is completed, redirect to home.php to display text otherwise display error
  
  if ($choice == "") {

      exit("*Please make a choice");
  }


   else {

    $sql = "INSERT into `preference` (choice, tea, price_r, product_image, detail_image, information, email)
    VALUES ('$choice', '$tea', '$price_r', '$product_image', '$detail_image', '$information', '$email')";

    $result = $conn->query($sql);
    header("Location:home.php");
      exit;
    echo "Error, could not open file for writing.";
  }

}

?>


  <Footer> 
    <div class="bottomNav">
      <p class="bottomNav_p">Dawood Shafqat</p>
      <p class="bottomNav_p">Kwankiu Chu</p>
      <p class="bottomNav_p"> @2020 Copyright - IAT352 - PA3</p>
    </div>
  </Footer>


    


</body>

</html>
