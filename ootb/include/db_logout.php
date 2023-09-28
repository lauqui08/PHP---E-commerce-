<?php
session_start();
date_default_timezone_set('Asia/Manila');
$con=mysqli_connect("localhost","root","","ootb");

if (!isset($_SESSION['transaction_session'])) {
	# code...
$_SESSION['transaction_session'] = rand('10000','100000').date('my');
}else{
$_SESSION['transaction_session'] = $_SESSION['transaction_session'];
}
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>