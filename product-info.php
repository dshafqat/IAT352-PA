<?php
require 'config.php';
?>
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


	<!-- The body sections except Top Navigation bar & the Footer -->
	<section class="body_Style">
		<section class="main_container">
			<div class="main_store_box">			
				<?php

				$somevar = $_GET['uid'];



				$query = "SELECT * FROM products";

				$result = $conn->query($query);
				while($row = $result->fetch_assoc()) {

				    if ($row["id"] == $somevar) {
				    	$postname = $row['product_name'];
				    	$postimage = $row['detail_image'];
				    	$postinfo = $row['information'];
				    	$price_r = $row['price_r'];
				    	$price_l = $row['price_l'];

					}}
				?>
				<img class="image_sample_product_styling" src="<?= $postimage; ?>" alt="Product2 Image">
			</div>

			<div class="main_store_box">

				<h3 class="style_text"><?= $postname; ?></h3>
			<script>
				function myFunction() {
				  var x = localStorage.getItem("selectedid");
				  document.getElementById("demo").innerHTML = x;
				}

			</script>

				<p><?= $postinfo; ?></p>
				<p>R: <?= $price_r; ?> L: <?= $price_l; ?></p>
				<a href="product-info.php"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				<a href="product-info.php"><p><button class="btn btn-3 btn-3a icon-checkout">Check Out</button></p></a>
			</div>
		</section>

		<section class="review_container"> <!-- Other Customer Reviews -->
			<section class="review_box">
				<h3 class="style_text">Customer Review</h3>
				<section>
					<h5 class="customer_name">Freddie Barnett</h5>
				</section>	

				<section>  <!-- Star Rating Section -->
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
				</section>

				<h6>Perfect beverage for me</h6>
				<p>It’s a perfect beverage to enjoy any day with great health benefits! With the addition of strawberry it makes you look forward to Spring and Summer.</p>
			</section>

			<section class="review_box">
				<section>
					</i><h5 class="customer_name">Arslan Hart</h5>
				</section>	

				<section>  <!-- Star Rating Section -->
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
				</section>

				<h6>Delicious Green Tea</h6>
				<p>Delicious green tea. If you're tired of plain or jasmine flavored green tea, try this strawberry one.</p>
			</section>

			<section class="review_box">
				<section>
					</i><h5 class="customer_name">Kate Cole</h5>
				</section>	

				<section>  <!-- Star Rating Section -->
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
				</section>

				<h6>This is my favorite tea ever</h6>
				<p>This is my favorite tea ever! It is sweet enough but not too sweet. I am one of those people who always add a little honey and creamer to tea, but I can actually stand to drink this stuff plain or with just a tiny bit of sweetener. You can definitely taste the strawberries.</p>
			</section>
		</section> <!-- End of the Other customer review -->
			<?php  ?>

	</section> <!-- End of The body sections -->


</body>

</html>