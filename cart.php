<?php
require 'config.php';
?>
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">

	<title>Shopping Cart</title>


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

		</nav>
	</header>
	<br>
	<br>
	<br>
	<br>
	<br>
<body>

<div class="cartform">
<div id="cartlist">

	<!-- Connect to the cart table from the database -->
<?php
$sql = $conn->query("SELECT * FROM cart");
//Count the row for the table, start the loop and print the list if the table is not empty
$row_cnt = $sql->num_rows;
if($row_cnt > 0){
    $total_price = 0;
?> 

<table class="carttable">
	<tr>
		<th></th>
		<th>ITEM NAME</th>
		<th>QUANTITY</th>
		<th>UNIT PRICE</th>
		<th>ITEMS TOTAL</th>
	</tr> 
<!-- Connect the table from the database -->
	<?php
		$sql="SELECT * FROM cart";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc()){
	?>
<!-- Output the data from the table -->	
<tr>
	<td><img src="<?= $row['product_image']; ?>" width="50" height="70" /></td>
	<td><?= $row['product_name']; ?>
		<form method='post' action=''>
			<input type='hidden' name='code' value="<?php echo $row['product_code']; ?>" />
			<!--<button onclick="removeitem()" type='submit' class='remove'>Remove Item</button>-->
		</form>
	</td>
<td><?= $row['qty']; ?></td>
<!--	<script>
		function removeitem() {
		  var txt;
		  var r = confirm("Are you sure?");
		  if (r == true) {
		    <?php
		    	$code = $row['product_code'];
				$sql3 = "DELETE FROM cart WHERE product_code='$code'";
		    ?>
	  } 
	}
	</script>
-->
<!--
<?php
$code=$row['product_code'];
	if (isset($_REQUEST['setqty'])) {
	$setqty = $_REQUEST["setqty"];
	$code = $row['product_code'];
	$sql2 = "UPDATE cart SET qty = '$setqty' WHERE product_code = '$thiscode'";
	//$result = $conn->query($sql2);
}
?>-->
<!-- Display the price and calculate the total price-->
<?php $price=(float)$row['product_price'];?>
<td><?php echo "$".$price; ?></td>
<td><?php echo "$".$price*$row['qty']; ?></td>
</tr>

<?php
$total_price += ($price*$row['qty']);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
<tr>
	<td colspan="5" align="right">

	<form method="post" action="">
	<input name="remove_button" type="submit" value=" Remove Items " />
    <input name="submit_button" type="submit" value=" Place Order " />
</form>

</td>
</tr>

<div>
<!-- Switch to other page when submit the cart-->
<?php
	if(isset($_POST['submit_button']))
	{
	    mysqli_query($conn, 'TRUNCATE TABLE `cart`');
	    header("Location: " . $_SERVER['PHP_SELF']);
	    header("Location:orderConfirmation.php");
	    
	   
	}

//Clean the table when click on the remove button
	if(isset($_POST['remove_button']))
	{
	    mysqli_query($conn, 'TRUNCATE TABLE `cart`');
	    header("Location: " . $_SERVER['PHP_SELF']);
	    exit();

	}
?>
</tbody>
</table> 
  <?php  
}
else{
//Show when the table is empty	
 echo "<h3>Your cart is empty!</h3>";
 }
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
</div>
</body>



</html>