<!-- Please import the sql file in the folder to see the list-->
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

			<h6 class="filtertitle">Price</h6>
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

		</div>
		<div class="col-lg-9">
			
			<input type="text" name="search" class="form-control" id="search" placeholder="Search Products" />
			<ul class ="list-group" id="searchresult"></ul>
			<br />

			<h5 class="text-center" id="textChange">All Products</h5>
			<hr>
			<div class="row" id="result">
				<?php
					$sql="SELECT * FROM products";
					$result=$conn->query($sql);
					while($row=$result->fetch_assoc()){
				?>
				<!-- Card view for product page, write the data from database-->
				<div class="col-md-3 mb-2">
					<div class="card-deck">
						<div class="card border-secondary border-light">
							<img src="<?= $row['product_image']; ?>" class="card-img-top">
							<div class="card-img-overlay">
								<h6 style="margin-top:260px;"class="text-light text-center rounded p-1">
									<?= $row['product_name']; ?> </h6>
								</div>
								<div class ="card-body">
									<h4 class="card-title text-center">$<?= number_format($row['price_r'],1);?></h4>
									<p>
										Tea : <?= $row['tea']; ?><br>
										Add_ons : <?= $row['add_on']; ?><br>
									</p>
									<a onclick="myFunction(<?= $row['id']; ?>)" class="btn view">View</a>
									<div id="pickid"></div>

									<script>
										function myFunction(selectedid){
  											window.location.href ="product-info.php?uid="+selectedid;

										}
									</script>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- Call the function for filter, code learnt from https://www.mostlikers.com/2016/10/brand-size-checkbox-search-filter-using-php-jquery.html?fbclid=IwAR2sEq_fMdwj3gwa0G-rsES5wT4UZ_9AfyUMVxoAhbzVoFYRp99G4i1yXPg-->

<script type="text/javascript">

	$(document).ready(function(){
		//if the check box for the filter is click, use post to process the data in action.php
		$(".product_check").click(function(){

			var action = 'data';
			var tea = get_filter_text('tea');
			var add_on = get_filter_text('add_on');
			var price_r = get_filter_text('price_r');

			$.ajax({
				url:'action.php',
				method:'POST',
				data:{action:action,tea:tea,add_on:add_on,price_r:price_r},
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
	//empty the list if the input box is empty
	$('#search').blur(function()
	{
	    if( $(this).val().length === 0 ) {
	        $('#searchresult').empty();
	    }
	});
	//Use JSON to show data that match the user's input
	$('#search').keydown(function(){
			$('#searchresult').html('');
			var searchField = $('#search').val();
			var expression = new RegExp(searchField, "i");
			$.getJSON('data.json', function(data){
				$.each(data, function(key, value){
					if(value.name.search(expression) != -1 || value.price.search(expression)!=-1){
						$('#searchresult').append('<a onclick="myFunction('+value.id+')"><li class="list-group-item"><img src="'+value.image+'" height="40" width="40" class="img-thumbnail" /> &nbsp;<span class="text-muted"> '+value.name+'  &nbsp;&nbsp;|&nbsp;&nbsp; Tea: '+value.tea+' &nbsp;&nbsp;|&nbsp;&nbsp; Add_on: '+value.add_on+' &nbsp;&nbsp;|&nbsp;&nbsp; $ '+value.price+'</span></li></a>');
					}
				});
			})
		});
});
</script>

<!-- Footer section  -->
	<Footer> 
		<div class="bottomNav">
			<p class="bottomNav_p">Dawood Shafqat</p>
			<p class="bottomNav_p">Kwankiu Chu</p>
			<p class="bottomNav_p"> @2020 Copyright - IAT352 - PA3</p>
		</div>
	</Footer>

	</body>
</html>
