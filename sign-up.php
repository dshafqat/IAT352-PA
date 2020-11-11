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
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php">Menu</a></li>
					<li><a href="sign-up.php">Sign Up</a></li>
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
				<select id="" name="choice">


				  <option value="BubbleTea">Bubble Tea</option>
				  <option value="MilkTea">Milk Tea</option>

				</select>

				</fieldset>

				<input type="submit" name="submit" value="Submit" />
				</form>
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

$sql = "INSERT into `users` (name, email, password, choice)

VALUES ('$name',  '$email','$password', '$choice')";

$result = $conn->query($sql);

// Open connection to the $file in writing mode

	// check if form is valid
	if ($password != $ReEnterPassword) {
			// If passwords not the same
			exit("*Passwords missmatch!");
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
			<p class="bottomNav_p"> @2020 Copyright - IAT352 - PA1</p>
		</div>
	</Footer>



</body>	

</html>
