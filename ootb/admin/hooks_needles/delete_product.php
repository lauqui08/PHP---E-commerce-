<?php

include('../../include/db.php');

$id = htmlentities($_GET['id']);


if (isset($_GET['id'])) {
	# code...

	$query = mysqli_query($con,"DELETE FROM `ootb_hooks_and_needles` WHERE product_id = '$id'");

	header("Location:../hooks_needles/");
}

?>