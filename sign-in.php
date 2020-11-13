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
					<li><a href="login_successful.php">Account</a></li>
					<li><a href="cart.php">Cart</a></li>
				</ul>
			</div>
		</nav>
	</header>

	<body>

			<div class="form-signup">
	<form action="sign-in.php" method="post">
		<fieldset>
			<legend><span class="number"> Sign In</legend>

			
				<input type="text" name="name" placeholder="Enter Name *" value="<?php  $name;?>">

				<input type="email" name="email" placeholder="Enter Email *" value="<?php  $email;?>">

				<input type="password" name="password" placeholder="Enter Password *" value="<?php  $password;?>">
	
				</fieldset>

				<input type="submit" name="submit" value="Submit" />
				</form>

				<a href="sign-up.php">Not a member? Sign up now!</a>
				
				</div>
			

<!-- Empty variables check-->
			<?php
				
			require('config.php');
			include("active_session_check.php");

			if (isset($_REQUEST['email'])) {
				// define variables and set to empty values
			$email = $password = $name = "";

			$email = $_REQUEST["email"];
			$password = $_REQUEST["password"];
			$name = $_REQUEST["name"];


			$sql = "SELECT * FROM `users` WHERE email='$email' and password='$password'";

			$result = $conn->query($sql); 
			$rows = mysqli_num_rows($result);

		//if row equal 1 means user does exist
			if ($rows == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['name'] = $name;
				header("Location:login_successful.php");
			} else {

				//else means user enters the wrong username or password
				echo "<div class='form'>
					<h3>Email or password is incorrect.</h3>
				</div>";


				// echo "<p>Not registered yet? <a href='register.php'>Register Here</a></p>";
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
