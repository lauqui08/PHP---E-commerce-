<?php
session_start();
date_default_timezone_set('Asia/Manila');
$con=mysqli_connect("localhost","root","","ootb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if (!isset($_SESSION['login_user'])) {
  	# code...
  	header("Location:http://localhost/ootb/");
  }
?>