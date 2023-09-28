<?php

include('../../include/db.php');

$sku = htmlentities($_POST['sku']);
$pname = htmlentities($_POST['pname']);
$pcolor = htmlentities($_POST['pcolor']);
$pstyle = htmlentities($_POST['pstyle']);
$pthickness = htmlentities($_POST['pthickness']);
$pbrand = htmlentities($_POST['pbrand']);
$pprice = htmlentities($_POST['pprice']);
$pdetails = htmlentities($_POST['pdetails']);
$pquantity = htmlentities($_POST['pquantity']);
$pimage = htmlentities($_POST['pimage']);
//$submit = htmlentities($_POST['submit']);

if (isset($_POST['submit'])) {
	# code...

	$query = mysqli_query($con,"INSERT INTO `ootb_products`(`product_id`, `product_sku`, `product_name`, `product_color`, `product_style`, `product_thickness`, `product_brand`, `product_details`, `product_quantity`, `product_price`, `product_image`) VALUES ('','$sku','$pname','$pcolor','$pstyle','$pthickness','$pbrand','$pdetails','$pquantity','$pprice','$pimage')");

	header("Location:../yarns/");
}

?>