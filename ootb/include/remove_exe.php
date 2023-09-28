<?php
include('db.php');
$func = $_POST['func'];
$transacid = $_POST['transaction_id'];
$id = $_POST['id'];
$transaction = $_SESSION['transaction_session'];
if (isset($_POST['func'])) {

			$remove = mysqli_query($con,"DELETE FROM `ootb_temp_transaction` WHERE id='$id' AND transaction_id='$transacid'");

 } ?>


