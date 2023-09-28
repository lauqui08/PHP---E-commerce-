<?php
  include("../../include/db.php");

unset($_SESSION['transaction_session']);
$_SESSION['transaction_session'] = rand('10000','100000').date('my');

$username = $_GET['username'];
$transaction_id =$_GET['transaction_id'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$address = $_GET['address'];
$email = $_GET['email'];
$contact = $_GET['contact'];
$totalqty = $_GET['totalqty'];
$totalprice = $_GET['totalprice'];
$transaction_datetime = date('Y-m-d H:i:s');

$getaccountnumber = mysqli_query($con,"SELECT * FROM `ootb_account` WHERE username = '$username'");
$accnum = mysqli_fetch_assoc($getaccountnumber);
$account_number = $accnum['account_number'];

$insertorder = mysqli_query($con,"INSERT INTO `ootb_transactions`(`id`, `transaction_id`, `account_number`, `total_quantity`, `total_price`, `payment_method`, `transaction_date`) VALUES ('','$transaction_id','$account_number','$totalqty','$totalprice','cash on delivery','$transaction_datetime')");





	$updateorders = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND status='pending'");
	while ($row = mysqli_fetch_assoc($updateorders)) {
		# code...
		$sku = $row['product_sku'];
		$qty = $row['quantity'];

		$yarn = mysqli_query($con,"SELECT * FROM `ootb_products` WHERE product_sku = '$sku'");
		$accessories = mysqli_query($con,"SELECT * FROM `ootb_accessories` WHERE product_sku = '$sku'");
		$hooks = mysqli_query($con,"SELECT * FROM `ootb_hooks_and_needles` WHERE product_sku = '$sku'");
		$projects = mysqli_query($con,"SELECT * FROM `ootb_projects` WHERE product_sku = '$sku'");
		$tolls = mysqli_query($con,"SELECT * FROM `ootb_tools` WHERE product_sku = '$sku'");

			while ($ryarn = mysqli_fetch_assoc($yarn)) {
				# code...
		$yqty = $ryarn['product_quantity'] - $qty;
		$updateyarn = mysqli_query($con,"UPDATE `ootb_products` SET`product_quantity`='$yqty' WHERE product_sku = '$sku'");
			}



			while ($raccess = mysqli_fetch_assoc($accessories)) {
				# code...
		$aqty = $raccess['product_quantity'] - $qty;
		$updateaccessories = mysqli_query($con,"UPDATE `ootb_accessories` SET `product_quantity`='$aqty' WHERE product_sku = '$sku'");
			}


			while ($rhooks = mysqli_fetch_assoc($hooks)) {
				# code...
		$hqty = $rhooks['product_quantity'] - $qty;
		$updatehooks = mysqli_query($con,"UPDATE `ootb_hooks_and_needles` SET `product_quantity`='$hqty' WHERE product_sku = '$sku'");
			}


			while ($rprojects = mysqli_fetch_assoc($projects)) {
				# code...
		$pqty = $rprojects['product_quantity'] - $qty;
		$updateprojects = mysqli_query($con,"UPDATE `ootb_projects` SET `product_quantity`='$pqty' WHERE product_sku = '$sku'");
			}


			while ($rtools = mysqli_fetch_assoc($tolls)) {
				# code...
		$tqty = $rtools['product_quantity'] - $qty;
		$updatetools = mysqli_query($con,"UPDATE `ootb_tools` SET `product_quantity`='$tqty' WHERE product_sku = '$sku'");
			}


$updatetemp = mysqli_query($con,"UPDATE `ootb_temp_transaction` SET`status`='ordered' WHERE transaction_id = '$transaction_id' AND product_sku = '$sku'");

	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Out of the BOX official receipt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1>Out of the BOX</h1>
  <p>
  	Naguillian, La Union<br/>
  	outoftheboxofficial27@gmail.com<br/>
  	0936XXXXXXX
  </p>
  <p>SALES RECEIPT</p> 
  <table class="table table-condensed">
  	<tr>
  		<th><abbr title="Quantity">Qty.</abbr></th>
  		<th>Description</th>
  		<th>Price</th>
  		<th>Amount</th>
  	</tr>
  	<?php
  			$display = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id'");
  			while ($result = mysqli_fetch_assoc($display)) {
  				# code...
  				$sku = $result['product_sku'];

  				$yarn = mysqli_query($con,"SELECT * FROM `ootb_products` WHERE product_sku = '$sku'");
				$accessories = mysqli_query($con,"SELECT * FROM `ootb_accessories` WHERE product_sku = '$sku'");
				$hooks = mysqli_query($con,"SELECT * FROM `ootb_hooks_and_needles` WHERE product_sku = '$sku'");
				$projects = mysqli_query($con,"SELECT * FROM `ootb_projects` WHERE product_sku = '$sku'");
				$tolls = mysqli_query($con,"SELECT * FROM `ootb_tools` WHERE product_sku = '$sku'");

				while ($yarn_r = mysqli_fetch_assoc($yarn)) { ?>
						<tr>
							<td>
								<?php
								$yarn_sku = $yarn_r['product_sku'];
								$qtyyarn = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND product_sku = '$yarn_sku'");
								$result_yarn_qty = mysqli_fetch_assoc($qtyyarn);
								echo $result_yarn_qty['quantity'];
								 ?>
							</td>
							<td><?php echo $yarn_r['product_name']; ?></td>
							<td><?php echo " &#8369;".$yarn_r['product_price']; ?></td>
							<td>
								<?php
								$yarn_sku = $yarn_r['product_sku'];
								$qtyyarn = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND product_sku = '$yarn_sku'");
								$result_yarn_qty = mysqli_fetch_assoc($qtyyarn);
								echo " &#8369;".$result_yarn_qty['price'];
								 ?>
							</td>
						</tr>
				<?php }
				while ($accessories_r = mysqli_fetch_assoc($accessories)) { ?>
						<tr>
							<td>
								<?php
								$acce_sku = $accessories_r['product_sku'];
								$qtyaccess = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND product_sku = '$acce_sku'");
								$result_access_qty = mysqli_fetch_assoc($qtyaccess);
								echo $result_access_qty['quantity'];
								 ?>
							</td>
							<td><?php echo $accessories_r['product_name']; ?></td>
							<td><?php echo " &#8369;".$accessories_r['product_price']; ?></td>
							<td>
								<?php
								$acce_sku = $accessories_r['product_sku'];
								$qtyaccess = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND product_sku = '$acce_sku'");
								$result_access_qty = mysqli_fetch_assoc($qtyaccess);
								echo " &#8369;".$result_access_qty['price'];
								 ?>
							</td>
						</tr>
				<?php }
				while ($hooks_r = mysqli_fetch_assoc($hooks)) { ?>
						<tr>
							<td>
								<?php
								$hooks_sku = $hooks_r['product_sku'];
								$qtysku = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND product_sku = '$hooks_sku'");
								$result_tools_qty = mysqli_fetch_assoc($qtysku);
								echo $result_tools_qty['quantity'];
								 ?>
							</td>
							<td><?php echo $hooks_r['product_name']; ?></td>
							<td><?php echo " &#8369;".$hooks_r['product_price']; ?></td>
							<td>
								<?php
								$hooks_sku = $hooks_r['product_sku'];
								$qtysku = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND product_sku = '$hooks_sku'");
								$result_tools_qty = mysqli_fetch_assoc($qtysku);
								echo " &#8369;".$result_tools_qty['price'];
								 ?>
							</td>
						</tr>
				<?php }
				while ($projects_r = mysqli_fetch_assoc($projects)) { ?>
						<tr>
							<td>
								<?php
								$project_sku = $projects_r['product_sku'];
								$qtyproject = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND product_sku = '$project_sku'");
								$result_project_qty = mysqli_fetch_assoc($qtyproject);
								echo $result_project_qty['quantity'];
								 ?>
							</td>
							<td><?php echo $projects_r['product_name']; ?></td>
							<td><?php echo " &#8369;".$projects_r['product_price']; ?></td>
							<td>
								<?php
								$project_sku = $projects_r['product_sku'];
								$qtyproject = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND product_sku = '$project_sku'");
								$result_project_qty = mysqli_fetch_assoc($qtyproject);
								echo " &#8369;".$result_project_qty['price'];
								 ?>
							</td>
						</tr>
				<?php }
				while ($tolls_r = mysqli_fetch_assoc($tolls)) { ?>
						<tr>
							<td>
								<?php
								$tools_sku = $tolls_r['product_sku'];
								$qtytools = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND product_sku = '$tools_sku'");
								$result_tools_qty = mysqli_fetch_assoc($qtytools);
								echo $result_tools_qty['quantity'];
								 ?>
							</td>
							<td><?php echo $tolls_r['product_name']; ?></td>
							<td><?php echo " &#8369;".$tolls_r['product_price']; ?></td>
							<td>
								<?php
								$tools_sku = $tolls_r['product_sku'];
								$qtytools = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE account_number = '$account_number' AND transaction_id = '$transaction_id' AND product_sku = '$tools_sku'");
								$result_tools_qty = mysqli_fetch_assoc($qtytools);
								echo " &#8369;".$result_tools_qty['price'];
								 ?>
							</td>
						</tr>
				<?php }

  			}
  	 ?>
  	 					<tr>
  	 						<td><b><?php echo $_GET['totalqty']; ?></b></td>
  	 						<td></td>
  	 						<td><b>Total:</b></td>
  	 						<td><b> &#8369; <?php echo $_GET['totalprice']; ?></b></td>
  	 					</tr>
  </table>
  <hr/>
  <i>It was really a pleasure doing business with you! Thank you for choosing us!</i>
</div>
<script type="text/javascript">
	alert('CTRL + P to print!');
</script>
</body>
</html>