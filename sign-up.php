<?php session_start(); ?>



<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">

	<title>Sign Up</title>


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

			<div class="form-signup">
	<form action="sign-up.php" method="post">
		<fieldset>
			<legend><span class="number"> Sign Up</legend>
				<input type="text" name="name"  placeholder="Enter Name *"  value="<?php  $name;?>" >

				<input type="email" name="email" placeholder="Enter Email *" value="<?php  $email;?>">
				<input type="password" name="password" placeholder="Create a Password *" value="<?php  $password;?>">

				<input type="password" name="RepassWord" placeholder="Re-Enter the password *" value="<?php  $RepassWord;?>">


					<label for="job">Tea Preference:</label>

					<?php 

					include 'config.php';
					// create empty variables
					$product_name = "";
					$tea = "";
					$price_r = "";
					$product_image = "";
					$detail_image = "";
					$information = "";

					
					//set varable to databse selection

					$sqla = $conn->query("SELECT product_name FROM products");

					?>

				<!-- dropdown menu -->

				<select id="" name="choice">

				<?php 

				// populate list with product names retriieved from products table
				while($rows = $sqla->fetch_assoc())
				{


				$product_name = $rows['product_name'];
				

				 echo" <option value='$product_name'>$product_name</option>";
        }
				  ?>
				</select>

				</fieldset>

				<input type="submit" name="submit" value="Submit" />
				</form>

				<a href="sign-in.php">Already have an account? Sign in now!</a>

				</div>
			

<!-- Empty variables check-->








<?php
	
require('config.php');

if (isset($_REQUEST['name'])) {
	// define variables and set to empty values
$name = $email = $password = $ReEnterPassword = "";

$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$ReEnterPassword = $_REQUEST["RepassWord"];
$choice = $_REQUEST["choice"];



// Select other data from products to forward into preference database

$query = "SELECT * FROM products";

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


	// check if form is valid
	if ($password != $ReEnterPassword) {
			// If passwords not the same
			exit("*Passwords missmatch!");
	}


	//check if the email already exist in the database
	$sqli = $conn->query("SELECT * FROM users WHERE email='$email'");
	$row_cnt1 = $sqli->num_rows;

	if($row_cnt1 > 0){
	    exit("*Another user with this email already exists, please try different email*");
	}


 	if ($name == "" || $email == "" || $password == "" || $choice =="")  {
		// If missing fields echo this message
		exit("*Please complete the form");
	}
	// After form is completed, redirect to welcome.php to display text otherwise display error
	

	// Write string to the file
	// the function returns the number of bytes interted or false

	// After form is completed, redirect to welcome.php to display text otherwise display error



	 else {
	 	// inser user data into users table

		$sql = "INSERT into `users` (name, email, password, choice)
		VALUES ('$name',  '$email','$password', '$choice')";
		$result = $conn->query($sql);

		//insert preference data into preference table

		$sql = "INSERT into `preference` (choice, tea, price_r, product_image, detail_image, information, email)
		VALUES ('$choice', '$tea', '$price_r', '$product_image', '$detail_image', '$information', '$email')";

		$result = $conn->query($sql);
		//redirect to location.php
		header("Location:welcome.php");
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
