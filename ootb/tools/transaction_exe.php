<?php
 include("../include/db_logout.php");

$username = $_GET['username'];
$product_sku = $_GET['product_sku'];
$quantity = $_GET['quantity'];
$addtocart = $_GET['addtocart'];
$product_price = $_GET['product_price'];
$transaction = $_SESSION['transaction_session'];
$transaction_datetime = date('Y-m-d H:i:s');

$getaccount = mysqli_query($con,"SELECT * FROM `ootb_account` WHERE username = '$username'");
$row = mysqli_fetch_assoc($getaccount);

$account_number = $row['account_number'];
$totprice = $quantity * $product_price;


$checktransaction = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND product_sku = '$product_sku'");
$verify = mysqli_num_rows($checktransaction);

		if ($verify != 1) {
			# code...
		$transaction_query = mysqli_query($con,"INSERT INTO `ootb_temp_transaction`(`id`, `transaction_id`, `account_number`, `product_sku`, `quantity`, `price`, `status`, `transaction_dtime`) VALUES ('','$transaction','$account_number','$product_sku','$quantity','$totprice','pending','$transaction_datetime')");
		}else{

			$row = mysqli_fetch_assoc($checktransaction);
			$t_quantity = $row['quantity'];
			$t_price = $row['price'];

			$a_quantity =$t_quantity + $quantity;
			$a_price = $t_price + $totprice;

			$update_transaction = mysqli_query($con,"UPDATE `ootb_temp_transaction` SET `quantity`='$a_quantity',`price`='$a_price',`transaction_dtime`='$transaction_datetime' WHERE transaction_id = '$transaction' AND product_sku = '$product_sku'");
		}

header("Location:../tools");
?>
