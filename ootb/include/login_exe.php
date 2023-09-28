<?php
   include("db.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      

      $result = mysqli_query($con,"SELECT * FROM ootb_account WHERE username = '$myusername' and password = '$mypassword'");
      $row = mysqli_fetch_assoc($result);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;

         if ($row['type'] =='admin') {
         header("location: ../admin/");
         }else{
            $transaction = $_SESSION['transaction_session'];
            $account_number = $row['account_number'];
            $temp_transac = mysqli_query($con,"UPDATE `ootb_temp_transaction` SET `account_number`='$account_number' WHERE transaction_id = '$transaction' AND account_number = ''");

         header("location: ../member/");
         }
         
      }else {
         echo "Your Login Name or Password is invalid";
         header("location: ../login.php");
      }
   }
?>