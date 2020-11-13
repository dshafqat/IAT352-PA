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
					<li><a href="sign-up.php">Account</a></li>
					<li><a href="cart.php">Cart</a></li>
				</ul>
			</div>
		<?php
			$sql = $conn->query("SELECT * FROM cart");
			$row_cnt = $sql->num_rows;
			$cart_count = $row_cnt;
		?>
		<div class="cart_div">
			<a href="cart.php"><img src="cart-icon.png" /> Cart<span>
			<?php echo $cart_count; ?></span></a>
		</div>
		</nav>
	</header>

<body>
	<!-- The body sections except Top Navigation bar & the Footer -->
	<section class="body_Style">
		<section class="main_container">
			<div class="main_store_box">	

				<?php
				$isTouch = isset($_GET['uid']);
				if($isTouch){
					$_SESSION['uid'] = $_GET['uid'];
					$somevar = $_GET['uid'];
				}else{
					$somevar = $_SESSION['uid'];
				}


				$query = "SELECT * FROM products";

				$result = $conn->query($query);
				while($row = $result->fetch_assoc()) {

				    if ($row["id"] == $somevar) {
				    	$postname = $row['product_name'];
				    	$postimage = $row['detail_image'];
				    	$postinfo = $row['information'];
				    	$price = $row['price_r'];
				    	$image = $row['product_image'];
				    	$code = $row['product_code'];

					}}
				?>
				<img class="image_sample_product_styling" src="<?= $postimage; ?>" alt="Product2 Image">
			</div>

			<div class="main_store_box">
				<div id="message"></div>
				<h3 class="style_text"><?= $postname; ?></h3>
			<script>
				function myFunction() {
				  var x = localStorage.getItem("selectedid");
				  document.getElementById("demo").innerHTML = x;
				}

			</script>

				<form action="" method="post">
				<p><?= $postinfo; ?></p>
				<p>$ <?= $price; ?> </p>
				<input type="text" name="qty"  placeholder="Enter Quantity"  value="<?php  $qty;?>" >
					<input type="submit" name="submit" value="Submit" />
				</form> 
			</div>
		</section>

		<section class="review_container"> <!-- Other Customer Reviews -->
			<section class="review_box">
				<h3 class="style_text">Customer Review</h3>
				<section>
					<h3 class="customer_name">Freddie Barnett</h3>
				</section>	

				<section>  <!-- Star Rating Section -->
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
				</section>

				<h5>Perfect beverage for me</h5>
				<p>It’s a perfect beverage to enjoy any day with great health benefits! With the addition of strawberry it makes you look forward to Spring and Summer.</p>
			</section>

			<section class="review_box">
				<section>
					</i><h3 class="customer_name">Arslan Hart</h3>
				</section>	

				<section>  <!-- Star Rating Section -->
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
				</section>

				<h5>Delicious Green Tea</h5>
				<p>Delicious green tea. If you're tired of plain or jasmine flavored green tea, try this strawberry one.</p>
			</section>

			<section class="review_box">
				<section>
					</i><h3 class="customer_name">Kate Cole</h3>
				</section>	

				<section>  <!-- Star Rating Section -->
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
				</section>

				<h5>This is my favorite tea ever</h5>
				<p>This is my favorite tea ever! It is sweet enough but not too sweet. I am one of those people who always add a little honey and creamer to tea, but I can actually stand to drink this stuff plain or with just a tiny bit of sweetener. You can definitely taste the strawberries.</p>
			</section>
		</section> <!-- End of the Other customer review -->
			<?php  ?>

	</section> <!-- End of The body sections -->

<Footer> 
		<div class="bottomNav">
			<p class="bottomNav_p">Dawood Shafqat</p>
			<p class="bottomNav_p">Kwankiu Chu</p>
			<p class="bottomNav_p"> @2020 Copyright - IAT352 - PA1</p>
		</div>
	</Footer>
<script type="text/javascript">
	$(document).ready(function(){
		$(".addItemBtn").click(function(e){
			echo 'alert(message successfully sent)';
			e.preventDefault();
			var $form = $(this).closest(".form-submit");
			var pid = $form.find(".pid").val();
			var pname = $form.find(".pname").val();
			var pprice = $form.find(".pprice").val();
			var pimage = $form.find(".pimage").val();
			var pcode = $form.find(".pcode").val();

			$.ajax({
				url: 'cartaction.php',
				method: 'post';
				data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
				success:function(response){
					$("message").html(response);
				}
			});
		});
	});
</script>
<?php
if (isset($_REQUEST['qty'])) {	
$sql = $conn->query("SELECT * FROM cart WHERE product_code='$code'");
$row_cnt = $sql->num_rows;
if($row_cnt > 0){
    $message = "Product is already added to your cart!";
	echo "<script type='text/javascript'>alert('$message');</script>";
}else{
	$qty = $_REQUEST["qty"];
$sqli = "INSERT INTO `cart` (product_name, product_price, product_image, qty, product_code)

VALUES ('$postname', '$price','$image', '$qty', '$code')";
$result = $conn->query($sqli);
$message = "Product is added to your cart!";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
}

?>

</body>


	<Footer> 
		<div class="bottomNav">
			<p class="bottomNav_p">Dawood Shafqat</p>
			<p class="bottomNav_p">Kwankiu Chu</p>
			<p class="bottomNav_p"> @2020 Copyright - IAT352 - PA2</p>
		</div>
	</Footer>


</html>