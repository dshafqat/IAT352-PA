
<?php
require 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<title>Menu</title>

	<link rel="stylesheet" href="css/main.css"> 
	<link rel="stylesheet" href="css/normalize.css"> 		
	<link rel="stylesheet" href="css/layout.css"> 
<!-- Import Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Icon  links -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
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


		<div class="banner-area">
			<div class="single-banner">
				<div class="banner-img">
					<img src="img/image1.jpg" alt="">
				</div>

				<div class="banner-text">
					<h2>Check Out Our Summer Specials</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>
				 <a class="shop" href="index.php">SHOP NOW</a>

				 <?php if (isset($_SESSION['name'])) { ?>
				<a class="shop" href="#favTea">FAVORITE</a>
					<?php } ?>
				
				</div>
			</div>
		</div>

	</header>

	<section class="body_Style">

		<!-- SlideShow Image 1 
		<section class="slideshow">
			<div class="slider slider-1">
				<div class="slider_item">
					<img class="bigImage_styling mySlides" src="img/hotSales2.jpg" src="" alt="Hot Sales">
				</div>
			</div>
		</section>  <!-- End of the Big image slideshow section -->

	

	 <?php if (isset($_SESSION['email'])) { ?>
					
					

		<section id="favTea"> 

			<h2> Order your favourite tea again! </h2>

			<?php

				$isTouch = isset($_GET['email']);
				if($isTouch){
					$_SESSION['email'] = $_GET['email'];
					$somevar = $_GET['email'];
				}else{
					$somevar = $_SESSION['email'];
				}


				$query = "SELECT * FROM preference";

				$result = $conn->query($query);
				while($row = $result->fetch_assoc()) {

				    if ($row["email"] == $somevar) {
				    	$product_name = $row['choice'];
				    	$detail_image = $row['detail_image'];
				    	$information = $row['information'];
				    	$price_r = $row['price_r'];
				    	$product_image = $row['product_image'];

					}}
				?>


				<h3> <?php echo $product_name ?> </h3>

				<img class="image_sample_product_styling" src="<?=$product_image; ?>" alt="Product2 Image">


				<div class="main_store_box">
				<div id="message"></div>
				<h3 class="style_text"><?php $product_name; ?></h3>

				<form action="" method="post">
				<p><?php $information; ?></p>
				<p>$ <?php echo $price_r ?> </p>
				<input class="qtytext" type="text" name="qty"  placeholder="Enter Quantity"  value="<?php  $qty;?>" >
					<button class="cartbtn cart" name="submit"> Add to Cart</button>
					<!--<input class="btn cart" type="submit" name="submit" value="Submit" />-->
				</form> 
			</div>

		</section>

		<?php } ?>




		<?php
       if (isset($_REQUEST['qty'])) {	
        $qty = $_REQUEST["qty"];
	if ($qty == ""){
		$message = "Please input the quantity!";
		echo "<script type='text/javascript'>alert('$message');</script>";					
	}else{
		$username = $_SESSION['name'];
		$sql = $conn->query("SELECT * FROM cart WHERE user_name='$username'");
		$row_cnt = $sql->num_rows;
		if($row_cnt > 0){
		    $message = "Product is already added to your cart!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			}else{
				$sqli = "INSERT INTO `cart` (user_name, product_name, product_price, product_image, qty, product_code)
						VALUES ('$username', '$product_name', '$price_r','$product_image', '$qty', 1)";
				$result = $conn->query($sqli);
				$message = "Product is added to your cart!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
	}
}

?>


		<section class="center_text style_text">
			<h1>Get Your Summer Special !</h1>
		</section>

		<section>
				<div class="main_container">

					<div class="main_box">
						<h2>Black Tea</h2>
						<h3 class="style_text">Black Tea</h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					</div>

					<div class="main_box">
						<a href="product-info.php"><img class="main_box_img1" src="img/bubbleTea/bubble_tea_2.png" alt="Bubble Tea image."></a>
					</div>

				</div>  
		</section> <!-- End of first product section -->

		<section>
				<div class="main_container">
					<div class="main_box">
						<a href="product-info.php"><img class="main_box_img2" src="img/bubbleTea/bubble_tea_3.png" alt="Bubble Tea image."></a>
					</div>

					<div class="main_box">
						<h2>Green Tea</h2>
						<h3 class="style_text">Bubble Tea</h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					</div>
				</div>  
		</section>

		  <!-- End of second product section -->
		
		<section>
			<!-- <button onclick="scrollToTop()" id="scroll-btn" title="Go to top">&#8679;</button> -->
			<!-- <script>
				window.onscroll = function()
				{
				    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)
				    {
				    	document.getElementById("scroll-btn").style.display = "block";
				    }
				    else
				    {
				    	document.getElementById("scroll-btn").style.display = "none";
				    }
				};

				function scrollToTop()
				{
				    document.body.scrollTop = 0;
				    document.documentElement.scrollTop = 0; 
				}
			</script>
		</section> -->

	</section>

	<section>
				<div class="main_container">

					<div class="main_box">
						<h2>Milk Tea</h2>
						<h3 class="style_text">Bubble Tea</h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					</div>

					<div class="main_box">
						<a href="product-info.php"><img class="main_box_img1" src="img/bubbleTea/bubble_tea_2.png" alt="Bubble Tea image."></a>
					</div>

				</div>  
		</section> <!-- End of third product section --> 

		<!-- End of The body sections -->
</section>
</body>



	<Footer> 
		<div class="bottomNav">
			<p class="bottomNav_p">Dawood Shafqat</p>
			<p class="bottomNav_p">Kwankiu Chu</p>
			<p class="bottomNav_p"> @2020 Copyright - IAT352 - PA2</p>
		</div>
	</Footer>


</html
