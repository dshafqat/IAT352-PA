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
				<img src="img/bubbleorzo logo.png" alt="Brand design / Logo">
			</div>

			<div class="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php">Menu</a></li>
					<!-- <li><a href="storeInfo.html">StoreInfo</a></li> -->
					<!-- <li><a href="aboutUs.html">About US</a></li> -->
					<!-- <li><a href="contact.html">Contact US</a></li> -->
					<li><a href="sign-in.php">Sign In</a></li>
					<li><a href="sign-up.php">Sign Up</a></li>
				</ul>
			</div>
		</nav>
	</header>


	<!-- <div class="signup-form">
		<h1>Sign up</h1>

		<form class ="signupform" action="registration.php" method="get">

			<label for="Firstname"> First name: </label><br><input type="text" name="username"><br>

			<label for="Lastname"> Last name: </label><br><input type="text" name="username"><br>

			<label for="Username"> Username: </label><br><input type="text" name="username"><br>

		    <label for="Password"> Password: </label><br><input type="text" name="password"><br>

		    <label for="Password2"> Re-enter Password: </label><br><input type="text" name="password2"><br>

		    <label for="Email"> Email: </label> <br><input type="text" name="email"><br>

		    <label for="Phone"> Phone Number: </label> <br><input type="text" name="phone"><br>

		    <label for="Notif"> Tea Preference: </label><br>
		    <input type="radio" name="type" value="tea">bubble tea
		    <input type="radio" name="type" value="tea">milk tea <br><br>


		  <input type="submit" name="signup" value="Sign up">

  </form>

</div> -->

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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// define variables and set to empty values
$name = $email = $password = $ReEnterPassword = "";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$ReEnterPassword = $_POST["RepassWord"];
$choice = $_POST["choice"];

$file = 'memberInfo.txt';
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
	else if($handle = fopen($file, 'a+')) {


	// Write string to the file
	// the function returns the number of bytes interted or false
	fwrite($handle, "Name:$name, Email:$email, Password:$password, Choice:$choice\n");

	// After form is completed, redirect to welcome.php to display text otherwise display error

	header("Location:welcome.php");
    exit;

	fclose($handle);
	} else {
	echo "Error, could not open file for writing.";
	}

}



?>






</body>	

</html>
