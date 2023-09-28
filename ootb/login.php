<!DOCTYPE html>
<html lang="en">
<?php
 include("include/db_logout.php");
  ?>
<head>
  <title>Out of the BOX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $email = $pwd = $repwd = $fullname = $bdate = $gender = $fbaccount = $caddress = $contact1 = $contact2 = "";

$username = htmlentities($_POST['username']);
$email = htmlentities($_POST['email']);
$pwd = htmlentities($_POST['pwd']);
$repwd = htmlentities($_POST['repwd']);
$fullname = htmlentities($_POST['fullname']);
$bdate = htmlentities($_POST['bdate']);
$gender = htmlentities($_POST['gender']);
$fbaccount = htmlentities($_POST['fbaccount']);
$caddress = htmlentities($_POST['caddress']);
$contact1 = htmlentities($_POST['contact1']);
$contact2 = htmlentities($_POST['contact2']);

//create account
$accrand = rand(100,99999) . $username;

if ($pwd != $repwd) {
  # code...
  $_SESSION['createaccount'] = "Password not match!";
}else{

$query = mysqli_query($con,"INSERT INTO `ootb_account`(`id`, `account_number`, `username`, `email`, `password`, `fullname`, `birthdate`, `gender`, `address`, `contact_number1`, `contact_number2`, `fb_account`, `type`, `photo`) VALUES ('','$accrand','$username','$email','$repwd','$fullname','$bdate','$gender','$caddress','$contact1','$contact2','$fbaccount','member','')");

        if ($query) {
          # code...
        }else{
            $_SESSION['createaccount'] = "Please provide anew username or email!";
        }

}

}
?>
<div class="jumbotron">
  <div class="container text-center">
    <?php include('include/header.php'); ?>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><abbr title="Out of the Box">OOTB</abbr></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../ootb">Home</a></li>
        <li><a href="yarns">Yarns</a></li>
        <li><a href="hooks_needles">Hooks and Needles</a></li>
        <li><a href="accessories">Accessories</a></li>
        <li><a href="tools">Tools</a></li>
        <li><a href="projects">Projects</a></li>
        <li>
           <a href="#" class="btn btn-link viewprod" data-toggle="modal" data-target="#myModalcart" data-backdrop="static">
          <span class="text-danger">
            <?php
              $transaction = $_SESSION['transaction_session'];
              $p_mycart = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND status='pending'");
              echo $count = mysqli_num_rows($p_mycart);
             ?>
          </span>
          <span class="glyphicon glyphicon-shopping-cart"></span>
           Cart
           </a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#login"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">  
  <div class="row">
    <div class="col-sm-4">
    <?php if (isset($_SESSION['createaccount'])) { ?>

    <div class="alert alert-danger alert-dismissible" id="myAlert">
      <a href="#" class="close">&times;</a>
      <strong>Error!</strong> <?php echo $_SESSION['createaccount']; ?>.
    </div>
      
    <?php unset($_SESSION['createaccount']); } ?>
    </div>

    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">LOGIN</div>
        <div class="panel-body">
            <form method="post" action="<?php echo htmlspecialchars("include/login_exe.php");?>">
              <div class="form-group">
                <label for="username">Username:</label> <span class="text-danger">*</span>
                <input type="text" class="form-control" name="username" id="username" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label> <span class="text-danger">*</span>
                <input type="password" class="form-control" name="password" id="password" required>
              </div>

              <button type="submit" class="btn btn-primary pull-right">Login</button>
            </form>
        </div>
        <div class="panel-footer"></div>
      </div>
    </div>

    <div class="col-sm-4"> 
        
    </div>
  </div>
</div><br>

<hr/>

<!--CREATE ACCOUNT START................................................................................................................................-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="container">
<h1>CREATE ACCOUNT</h1>   
  <div class="row">

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">ACCOUNT INFORMATION</div>
        <div class="panel-body">
          
          <div class="form-group">
              <label for="username">Username:</label> <span class="text-danger">*</span>
              <input type="text" class="form-control" name="username" maxlength="10" id="username" placeholder="JDC123" required>
            </div>

            <div class="form-group">
              <label for="email">Email:</label> <span class="text-danger">*</span>
              <input type="email" class="form-control" name="email" id="email" required>
          </div>

           <div class="form-group">
              <label for="pwd">Password</label> <span class="text-danger">*</span>
              <input type="password" class="form-control" name="pwd" id="pwd" required>
          </div>

          <div class="form-group">
              <label for="repwd">Confirm Password:</label> <span class="text-danger">*</span>
              <input type="password" class="form-control" name="repwd" id="repwd" required>
          </div>

        </div>
      </div>
    </div>

    <div class="col-sm-4"> 
      <div class="panel panel-info">
        <div class="panel-heading">PERSONAL INFORMATION</div>
        <div class="panel-body">

          <div class="form-group">
              <label for="fullname">Full name:</label> <span class="text-danger">*</span>
              <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Juan Dela Cruz" required>
            </div>

            <div class="form-group">
              <label for="bdate">Birth date:</label> <span class="text-danger">*</span>
              <input type="date" class="form-control" name="bdate" id="bdate" required>
          </div>

          <div class="form-group">
              <label for="gender">Gender:</label> <span class="text-danger">*</span>
              <select class="form-control" name="gender" id="gender" required>
                <option>Select</option>
                <option>Male</option>
                <option>Female</option>
              </select>
          </div>

           <div class="form-group">
              <label for="fb">Facebook Account <i>url</i>:</label> <span class="text-danger"></span>
              <input type="text" class="form-control" name="fbaccount" id="fb" placeholder="https://www.facebook.com/juandelacruz" >
          </div>

        </div>
      </div>
    </div>

    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">ADDRESS/ CONTACT NUMBER</div>
        <div class="panel-body">

            <div class="form-group">
              <label for="caddress">Complete Address:</label> <span class="text-danger">*</span>
              <textarea class="form-control" name="caddress" id="caddress" placeholder="House number, Barangay, Municipality/ City, Province" required></textarea>
            </div>

            <div class="form-group">
              <label for="contact1">Contact Number 1:</label> <span class="text-danger">*</span>
              <input type="number" min="0" max="9999999999" class="form-control" name="contact1" id="contact1" required>
          </div>

           <div class="form-group">
              <label for="contact2">Contact Number 2</label>
              <input type="number" min="0" max="9999999999" class="form-control" name="contact2" id="contact2">
          </div>

          <div class="form-group">
              
          </div>

        </div>
      </div>
    </div>

  </div>
</div><br>

<div class="container">
  <div class="row">
    <div class="col-sm-4"> 
    </div>
     <div class="col-sm-4"> 
    </div>
     <div class="col-sm-4"> 
        <button class="pull-right btn btn-lg btn-primary" type="submit">SUBMIT</button>
    </div>
  </div>
</div>
</form>
<!--CREATE ACCOUNT END................................................................................................................................-->

<hr/>



<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

<!-- Modal My Cart start...................................................................................................................-->
  <div class="modal fade" id="myModalcart" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</h4>
        </div>
        <div class="modal-body table-responsive">

          <form action="" method="GET" action="<?php echo htmlspecialchars("purchase.php");?>">

            <table class="table table-condensed">
              <?php
              //hooks and needle end
                    $viewcart = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND status='pending'");
                    while ($rowcart = mysqli_fetch_assoc($viewcart)) {
                      $temp_price = $rowcart['price'];
                      $temp_quantity = $rowcart['quantity'];
                      $temp_sku = $rowcart['product_sku']; 

                              $get_product = mysqli_query($con,"SELECT * FROM `ootb_hooks_and_needles` WHERE product_sku = '$temp_sku'");
                              while ($result = mysqli_fetch_assoc($get_product)) { ?>


                              <tr>
                                <td><?php echo $result['product_name']; ?></td>
                                <td><?php echo $result['product_category']; ?></td>
                                <td><?php echo $result['product_brand']; ?></td>
                                <td><?php echo $rowcart['quantity']; ?></td>
                                <td>&#8369;<?php echo $rowcart['price']; ?></td>
                                <td><a href="" class="btn btn-link"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
                              </tr>
                <?php
                            }

                    }//hooks and needle end

                    //yarns start
                    $viewcart = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND status='pending'");
                    while ($rowcart = mysqli_fetch_assoc($viewcart)) {
                      $temp_price = $rowcart['price'];
                      $temp_quantity = $rowcart['quantity'];
                      $temp_sku = $rowcart['product_sku']; 

                              $get_product = mysqli_query($con,"SELECT * FROM `ootb_products` WHERE product_sku = '$temp_sku'");
                              while ($result = mysqli_fetch_assoc($get_product)) { ?>


                              <tr>
                                <td><?php echo $result['product_name']; ?></td>
                                <td><span class="text-capitalize" style="color:<?php echo $result['product_color']; ?>;"><?php echo $result['product_color']; ?></span></td>
                                <td><?php echo $result['product_style']; ?></td>
                                <td><?php echo $result['product_thickness']; ?></td>
                                <td><?php echo $result['product_brand']; ?></td>
                                <td><?php echo $rowcart['quantity']; ?></td>
                                <td>&#8369;<?php echo $rowcart['price']; ?></td>
                                <td><a href="" class="btn btn-link"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
                              </tr>
                <?php
                            }

                    }//yarns end
                    //accessories start
                    $viewcart = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND status='pending'");
                    while ($rowcart = mysqli_fetch_assoc($viewcart)) {
                      $temp_price = $rowcart['price'];
                      $temp_quantity = $rowcart['quantity'];
                      $temp_sku = $rowcart['product_sku']; 

                              $get_product = mysqli_query($con,"SELECT * FROM `ootb_accessories` WHERE product_sku = '$temp_sku'");
                              while ($result = mysqli_fetch_assoc($get_product)) { ?>


                              <tr>
                                <td><?php echo $result['product_name']; ?></td>
                                <td><?php echo $result['product_brand']; ?></td>
                                <td><?php echo $rowcart['quantity']; ?></td>
                                <td>&#8369;<?php echo $rowcart['price']; ?></td>
                                <td><a href="" class="btn btn-link"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
                              </tr>
                <?php
                            }

                    }//accessories end
                    //tools start
                    $viewcart = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND status='pending'");
                    while ($rowcart = mysqli_fetch_assoc($viewcart)) {
                      $temp_price = $rowcart['price'];
                      $temp_quantity = $rowcart['quantity'];
                      $temp_sku = $rowcart['product_sku']; 

                              $get_product = mysqli_query($con,"SELECT * FROM `ootb_tools` WHERE product_sku = '$temp_sku'");
                              while ($result = mysqli_fetch_assoc($get_product)) { ?>


                              <tr>
                                <td><?php echo $result['product_name']; ?></td>
                                <td><?php echo $result['product_brand']; ?></td>
                                <td><?php echo $rowcart['quantity']; ?></td>
                                <td>&#8369;<?php echo $rowcart['price']; ?></td>
                                <td><a href="" class="btn btn-link"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
                              </tr>
                <?php
                            }

                    }//tools end
                     //projects start
                    $viewcart = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND status='pending'");
                    while ($rowcart = mysqli_fetch_assoc($viewcart)) {
                      $temp_price = $rowcart['price'];
                      $temp_quantity = $rowcart['quantity'];
                      $temp_sku = $rowcart['product_sku']; 

                              $get_product = mysqli_query($con,"SELECT * FROM `ootb_projects` WHERE product_sku = '$temp_sku'");
                              while ($result = mysqli_fetch_assoc($get_product)) { ?>


                              <tr>
                                <td><?php echo $result['product_name']; ?></td>
                                <td><?php echo $result['product_category']; ?></td>
                                <td><?php echo $result['product_brand']; ?></td>
                                <td><?php echo $rowcart['quantity']; ?></td>
                                <td>&#8369;<?php echo $rowcart['price']; ?></td>
                                <td><a href="" class="btn btn-link"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
                              </tr>
                <?php
                            }

                    }//projects end

               ?>
            </table>


            <button type="submit" class="btn btn-default">Purchase</button>
          </form>

      </div>
      <div class="modal-footer">Transaction ID: <?php echo $_SESSION['transaction_session']; ?></div>
    </div>
     <!-- Modal My Cart end...................................................................................................................-->


<script type="text/javascript">
  $(document).ready(function(){
    $(".close").click(function(){
        $("#myAlert").alert("close");
    });
});
</script>
</body>
</html>
