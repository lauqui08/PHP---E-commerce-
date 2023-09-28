<?php

include('../../include/db.php');

$sku = htmlentities($_POST['sku']);
$pname = htmlentities($_POST['pname']);
$pbrand = htmlentities($_POST['pbrand']);
$pprice = htmlentities($_POST['pprice']);
$pdetails = htmlentities($_POST['pdetails']);
$pquantity = htmlentities($_POST['pquantity']);
$pimage = htmlentities($_POST['pimage']);
//$submit = htmlentities($_POST['submit']);

if (isset($_POST['submit'])) {
	# code...

	$query = mysqli_query($con,"INSERT INTO `ootb_accessories`(`product_id`, `product_sku`, `product_name`,`product_brand`, `product_details`, `product_quantity`, `product_price`, `product_image`) VALUES ('','$sku','$pname','$pbrand','$pdetails','$pquantity','$pprice','$pimage')");

	header("Location:../accessories/");
}

?>