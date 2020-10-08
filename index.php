<?php
require 'config.php';
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
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
					<li><a href="sign-in.php">Sign In</a></li>
					<li><a href="sign-up.php">Sign Up</a></li>
				</ul>
			</div>
		</nav>
	</header>

<body>
	<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2">
			<h5>Filter Product</h5>
			<hr>
			<h6 class="filtertitle">Tea</h6>
			<ul class="list-group">
				<?php
				$sql="SELECT DISTINCT tea FROM products ORDER BY tea";
				$result=$conn->query($sql);
				while($row=$result->fetch_assoc()){
				?>
				<li class="list-group-item">
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input product_check" value="<?= $row['tea']; ?> " id="tea"><?= $row['tea'];?>
						</label>
					</div>
				</li>
			<?php } ?>
			</ul>

			<h6 class="filtertitle">Add-ons</h6>
			<ul class="list-group">
				<?php
				$sql="SELECT DISTINCT add_on FROM products ORDER BY add_on";
				$result=$conn->query($sql);
				while($row=$result->fetch_assoc()){
				?>
				<li class="list-group-item">
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input product_check" value="<?= $row['add_on']; ?> " id="add_on"><?= $row['add_on'];?>
						</label>
					</div>
				</li>
			<?php } ?>
			</ul>

			<h6 class="filtertitle">Price(Regular)</h6>
			<ul class="list-group">
				<?php
				$sql="SELECT DISTINCT price_r FROM products ORDER BY price_r";
				$result=$conn->query($sql);
				while($row=$result->fetch_assoc()){
				?>
				<li class="list-group-item">
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input product_check" value="<?= $row['price_r']; ?> " id="price_r"><?= $row['price_r'];?>
						</label>
					</div>
				</li>
			<?php } ?>
			</ul>

			<h6 class="filtertitle">Price(Large)</h6>
			<ul class="list-group">
				<?php
				$sql="SELECT DISTINCT price_l FROM products ORDER BY price_l";
				$result=$conn->query($sql);
				while($row=$result->fetch_assoc()){
				?>
				<li class="list-group-item">
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input product_check" value="<?= $row['price_l']; ?> " id="price_l"><?= $row['price_l'];?>
						</label>
					</div>
				</li>
			<?php } ?>
			</ul>

		</div>
		<div class="col-lg-9">
			<h5 class="text-center" id="textChange">All Products</h5>
			<hr>
			<div class="text-center">
				<img src="img/loader.gif" id="loader" widtg="200" style="display:none;">
			</div>
			<div class="row" id="result">
				<?php
					$sql="SELECT * FROM products";
					$result=$conn->query($sql);
					while($row=$result->fetch_assoc()){
				?>
				<div class="col-md-3 mb-2">
					<div class="card-deck">
						<div class="card border-secondary border-light">
							<img src="<?= $row['product_image']; ?>" class="card-img-top">
							<div class="card-img-overlay">
								<h6 style="margin-top:260px;"class="text-light text-center rounded p-1">
									<?= $row['product_name']; ?> </h6>
								</div>
								<div class ="card-body">
									<h4 class="card-title text-center">R:<?= number_format($row['price_r'],1);?> &nbsp;L:<?= number_format($row['price_l'],1); ?></h4>
									<p>
										Tea : <?= $row['tea']; ?><br>
										Add_ons : <?= $row['add_on']; ?><br>
									</p>
									<a href="#" class="btn cart">Add to Cart</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		$(".product_check").click(function(){

			var action = 'data';
			var tea = get_filter_text('tea');
			var add_on = get_filter_text('add_on');
			var price_r = get_filter_text('price_r');
			var price_l = get_filter_text('price_l');

			$.ajax({
				url:'action.php',
				method:'POST',
				data:{action:action,tea:tea,add_on:add_on,price_r:price_r,price_l:price_l},
				success:function(response){
					$("#result").html(response);
					$("#loader").hide();
					$("#textChange").text("Filtered Products");
				}
			});
		});

		function get_filter_text(text_id){
			var filterData = [];
			$('#'+text_id+':checked').each(function(){
				filterData.push($(this).val());
			});
			return filterData;
		}

	});
</script>
	</body>

<!--



	// The body sections except Top Navigation bar & the Footer 
	<section class="body_Style">
		<section class="center_text style_text">
			<h1>Hot Sales</h1>
		</section>

		<section class="main_container">
			<div class="main_manu_box">
				<p>Product1</p>

				<div class="center_text">
					<img class="image_product_styling" src="img/bubbleTea/bubble_tea_1.png" alt="product image #1">
					<h3>Original Milk Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product1.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
				 Add to Cart Button learned from W3school "https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_product_card"
				
			</div>

			<div class="main_manu_box">
				<p>Product2</p>

				<div class="center_text">
					<img class="image_product_styling" src="img/bubbleTea/bubble_tea_2.png" alt="product image #2">
					<h3>Strawberry Green Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product2.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product3</p>

				<div class="center_text">
					<img class="image_product_styling" src="img/bubbleTea/bubble_tea_3.png" alt="product image #3">
					<h3>Hokkaido Green Milk Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product3.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product4</p>

				<div class="center_text">
					<img class="image_product_styling" src="img/bubbleTea/bubble_tea_4.png" alt="product image #4">
					<h3>Thai Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product4.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product5</p>

				<div class="center_text">
					<img class="image_product_styling" src="img/bubbleTea/bubble_tea_5.png" alt="product image #5">
					<h3>Passion Fruit Green Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product5.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product6</p>

				<div class="center_text">
					<img class="image_product_styling" src="img/bubbleTea/bubble_tea_6.png" alt="product image #6">
					<h3>Taro Milk Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product6.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product7</p>

				<div class="center_text">
					<img class="image_product_styling" src="img/bubbleTea/bubble_tea_7.png" alt="product image #7">
					<h3>Lychee Black Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product7.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product8</p>

				<div class="center_text">
					<img class="image_product_styling" src="img/bubbleTea/bubble_tea_8.png" alt="product image #8">
					<h3>Green Apple Green Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product8.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>
		</section>   // end of the hot sales section 

		<section class="center_text style_text">
			<h1>Recommended For You</h1>
		</section>

		<section class="main_container">
			<div class="main_manu_box">
				<p>Product9</p>
				<div class="center_text">
					<img src="img/bubbleTea/bubble_tea_9.png" alt="product image #1">
					<h3>Jasmine Green Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product9.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product10</p>
				<div class="center_text">
					<img src="img/bubbleTea/bubble_tea_10.png" alt="product image #1">
					<h3>Pineapple Green Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product10.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product11</p>
				<div class="center_text">
					<img src="img/bubbleTea/bubble_tea_11.png" alt="product image #1">
					<h3>Coconut Milk Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product11.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product12</p>
				<div class="center_text">
					<img src="img/bubbleTea/bubble_tea_12.png" alt="product image #1">
					<h3>Peach Green Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product12.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product13</p>
				<div class="center_text">
					<img src="img/bubbleTea/bubble_tea_13.png" alt="product image #1">
					<h3>Matcha Milk Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product13.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product14</p>
				<div class="center_text">
					<img src="img/bubbleTea/bubble_tea_14.png" alt="product image #1">
					<h3>Matcha Milk Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product14.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product15</p>
				<div class="center_text">
					<img src="img/bubbleTea/bubble_tea_15.png" alt="product image #1">
					<h3>Rose Milk Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product15.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>

			<div class="main_manu_box">
				<p>Product16</p>
				<div class="center_text">
					<img src="img/bubbleTea/bubble_tea_16.png" alt="product image #1">
					<h3>Mango Green Tea</h3>
					<p>R:5.0 L:5.5</p>
					<a href="product16.html"><p><button class="btn btn-3 btn-3a icon-cart">Add to Cart</button></p></a>
				</div>
			</div>
		</section>   

	</section>  // End of the body section 

	// Footer section 
	<Footer> 
		<div class="bottomNav">
			<p class="bottomNav_p">Bubbleorze</p>
			<p>@2020 Copyright</p>
		</div>
	</Footer>
</body>	
-->
</html>
