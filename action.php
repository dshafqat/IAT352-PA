<?php
	require 'config.php';

	if(isset($_POST['action'])){
		$sql = "SELECT * FROM products WHERE tea !=''";

		if(isset($_POST['tea'])){
			$tea = implode("','", $_POST['tea']);
			$sql .="AND tea IN('".$tea."')";
		}

		if(isset($_POST['add_on'])){
			$add_on = implode("','", $_POST['add_on']);
			$sql .="AND add_on IN('".$add_on."')";
		}

		if(isset($_POST['price_r'])){
			$price_r = implode("','", $_POST['price_r']);
			$sql .="AND price_r IN('".$price_r."')";
		}

		if(isset($_POST['price_l'])){
			$price_l = implode("','", $_POST['price_l']);
			$sql .="AND price_l IN('".$price_l."')";
		}

		$result = $conn->query($sql);
		$output='';

		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$output .='<div class="col-md-3 mb-2">
					<div class="card-deck">
						<div class="card border-secondary">
							<img src="'. $row['product_image'].'" class="card-img-top">
							<div class="card-img-overlay">
								<h6 style="margin-top:260px;"class="text-light bg-info text-center rounded p-1">
									'. $row['product_name'].' </h6>
								</div>
								<div class ="card-body">
									<h4 class="card-title text-danger">R:'. number_format($row['price_r'],1).' &nbsp;L:'. number_format($row['price_l'],1).'</h4>
									<p>
										Tea : '. $row['tea'] .'<br>
										Add_ons : '. $row['add_on'] .'<br>
									</p>
									<a href="#" class="btn btn-success btn-block">Add to Cart</a>
								</div>
							</div>
						</div>
					</div>';
			}
		}
		else{
			$output = "<h3>No Products Found!</h3>";
		}
		echo $output;

	}
?>