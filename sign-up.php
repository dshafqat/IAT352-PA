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
					<?php if (isset($_SESSION['name'])) { ?>
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
					$product_name = "";
					$tea = "";
					$price_r = "";
					$product_image = "";
					$detail_image = "";
					$information = "";

					

					$sqla = $conn->query("SELECT product_name, tea, price_r, product_image, detail_image, information FROM products");

					?>


				<select id="" name="choice">

				<?php 

				while($rows = $sqla->fetch_assoc())
				{

				$tea = $rows['tea'];
				$product_name = $rows['product_name'];
				$price_r = $rows['price_r'];
				$product_image = $rows['product_image'];
				$detail_image = $rows['detail_image'];
				$information = $rows['information'];



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




// Open connection to the $file in writing mode




	// check if form is valid
	if ($password != $ReEnterPassword) {
			// If passwords not the same
			exit("*Passwords missmatch!");
	}

	//check if the username already exist in the database
	$sql2 = $conn->query("SELECT * FROM users WHERE name='$name'");
	$row_cnt2 = $sql2->num_rows;
	if($row_cnt2 > 0){
	    exit("*Another user with this username already exists, please try different name*");
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
		$sql = "INSERT into `users` (name, email, password, choice)
		VALUES ('$name',  '$email','$password', '$choice')";
		$result = $conn->query($sql);


		$sql = "INSERT into `preference` (choice, tea, price_r, product_image, detail_image, information)
		VALUES ('$choice', '$tea', '$price_r', '$product_image', '$detail_image', '$information')";

		$result = $conn->query($sql);
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
			<p class="bottomNav_p"> @2020 Copyright - IAT352 - PA2</p>
		</div>
	</Footer>



</body>	

</html>
