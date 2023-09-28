<?php

include('../../include/db.php');

$sku = htmlentities($_POST['sku']);
$pname = htmlentities($_POST['pname']);
$pstyle = htmlentities($_POST['pstyle']);
$pbrand = htmlentities($_POST['pbrand']);
$pprice = htmlentities($_POST['pprice']);
$pdetails = htmlentities($_POST['pdetails']);
$pquantity = htmlentities($_POST['pquantity']);
$pimage = htmlentities($_POST['pimage']);
//$submit = htmlentities($_POST['submit']);

if (isset($_POST['submit'])) {
	# code...

	$query = mysqli_query($con,"INSERT INTO `ootb_hooks_and_needles`(`product_id`, `product_sku`, `product_name`, `product_category`, `product_brand`, `product_details`, `product_price`, `product_quantity`, `product_image`) VALUES ('','$sku','$pname','$pstyle','$pbrand','$pdetails','$pprice','$pquantity','$pimage')");

	header("Location:../hooks_needles/");
}

?>