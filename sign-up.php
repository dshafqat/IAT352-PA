<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Menu</title>


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


	<div class="signup-form">
		<h1>Sign up</h1>

		<form class ="signupform" action="registration.php" method="get">

			<label for="Username"> Username: </label><br><input type="text" name="username"><br>

		    <label for="Password"> Password: </label><br><input type="text" name="password"><br>

		    <label for="Password2"> Re-enter Password: </label><br><input type="text" name="password2"><br>

		    <label for="Email"> Email: </label> <br><input type="text" name="email"><br>

		    <label for="Phone"> Phone Number: </label> <br><input type="text" name="phone"><br>

		    <label for="Notif"> Tea Preference: </label><br>
		    <input type="radio" name="type" value="tea">bubble tea
		    <input type="radio" name="type" value="tea">milk tea <br><br>


		  <input type="submit" name="submit" value="Submit">

  </form>

</div>




</body>	

</html>
