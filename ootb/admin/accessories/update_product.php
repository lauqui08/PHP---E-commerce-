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

if (isset($_POST['update'])) {
	# code...

$query = mysqli_query($con,"UPDATE `ootb_accessories` SET `product_name`='$pname',`product_brand`='$pbrand',`product_details`='$pdetails',`product_quantity`='$pquantity',`product_price`='$pprice',`product_image`='$pimage' WHERE `product_sku` = '$sku'");

	header("Location:../accessories/");
}

?>