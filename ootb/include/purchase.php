<?php
include('db.php');

$transaction = $_SESSION['transaction_session'];

//$purchased = mysqli_query($con,"UPDATE `ootb_temp_transaction` SET `status`='ordered' WHERE transaction_id='$transaction_id'");

//unset($_SESSION['transaction_session']);
//$_SESSION['transaction_session'] = rand('10000','100000').date('my');

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Out of the Box</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
  /* Popover */
  .popover {
      border: 2px inset #000000;
  }
  /* Popover Header */
  .popover-title {
      background-color: #696969; 
      color: #FFFFFF; 
      font-size: 20px;
      text-align:center;
  }
  /* Popover Body */
  .popover-content {
      background-color: #778899;
      color: #FFFFFF;
      padding: 25px;
  }
  /* Popover Arrow */
  .arrow {
      border-right-color: red !important;
  }
  input[type="number"] {
    width: 100px;
}
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1>Out of the Box payment via PAYPAL</h1>
  <p>Please check your ITEMS before Submitting</p> 
  <hr>
  <h3 class="text-primary">Transaction ID: <?php echo $transaction; ?></h3>

<div class="row">

	<div class="col-sm-3">
                    <?php $Myinfo = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND status='pending'");
                    $iden = mysqli_fetch_assoc($Myinfo);
                    $personalinfo = $iden['account_number'];

                    $displayinfo = mysqli_query($con,"SELECT * FROM `ootb_account` WHERE account_number= '$personalinfo'");
                    $info = mysqli_fetch_assoc($displayinfo);
                     ?>

  <table class="table table-condensed table-striped">
  	<tr>
  		<td><abbr title="Fullname"><span class="glyphicon glyphicon-user"></span></abbr></td>
  		<td><?php echo $info['fullname']; ?></td>
  	</tr>
  	<tr>
  		<td><abbr title="Address"><span class="glyphicon glyphicon-home"></span></abbr></td>
  		<td><?php echo $info['address']; ?></td>
  	</tr>
  	<tr>
  		<td><abbr title="Email"><span class="glyphicon glyphicon-envelope"></span></abbr></td>
  		<td><?php echo $info['email']; ?></td>
  	</tr>
  	<tr>
  		<td><abbr title="Primary Contact Number"><span class="glyphicon glyphicon-phone-alt"></span></abbr></td>
  		<td><?php echo $info['contact_number1']; ?></td>
  	</tr>
  	<tr>
  		<td><abbr title="Secondary Contact Number"><span class="glyphicon glyphicon-earphone"></span></abbr></td>
  		<td><?php echo $info['contact_number2']; ?></td>
  	</tr>
  	<tr>
  		<td><abbr title="Facebook Account"><span class="glyphicon glyphicon-globe"></span></abbr></td>
  		<td><?php echo $info['fb_account']; ?></td>
  	</tr>
  </table>

	</div>

	<div class="col-sm-6">

	<div class="panel panel-default">
      <div class="panel-heading">ITEMS</div>
      <div class="panel-body">
      	

              <table class="table table-condensed table-striped table-bordered">
              <?php
              //hooks and needle end
                    $viewcart = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND status='pending'");
                    while ($rowcart = mysqli_fetch_assoc($viewcart)) {
                      $temp_price = $rowcart['price'];
                      $temp_quantity = $rowcart['quantity'];
                      $temp_sku = $rowcart['product_sku']; 

                              $get_product = mysqli_query($con,"SELECT * FROM `ootb_hooks_and_needles` WHERE product_sku = '$temp_sku'");
                              while ($result = mysqli_fetch_assoc($get_product)) { ?>


                              <tr id="<?php echo $rowcart['id']; ?>">
                              	<td>
                              	<a href="#" data-toggle="popover" title="HOOKS AND NEEDLES" data-content="
                              	BRAND: <?php echo $result['product_brand']; ?>, CATEGORY: <?php echo $result['product_category']; ?>
                              	"><span class="glyphicon glyphicon-question-sign"></span></a>
                              	</td>
                                <td><?php echo $result['product_name']; ?></td>
                                <td>
                                 			<input class="input-sm" type="number" min="1" max="<?php echo $result['quantity']; ?>" value="<?php echo $rowcart['quantity']; ?>"/>
                                </td>
                                <td>&#8369;<?php echo $rowcart['price']; ?></td>
                                <td><a href="#" class="btn btn-link remove_item" data-trans="<?php echo $rowcart['transaction_id']; ?>" data-id="<?php echo $rowcart['id']; ?>" data-func="remove_needle"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
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


                              <tr id="<?php echo $rowcart['id']; ?>">
                             	<td>
                              	<a href="#" data-toggle="popover" title="YARNS" data-content="
                              	BRAND: <?php echo $result['product_brand']; ?>, TYPE: <?php echo $result['product_style']; ?>, THICKNESS: <?php echo $result['product_thickness']; ?>, COLOR: <?php echo $result['product_color']; ?>
                              	"><span class="glyphicon glyphicon-question-sign"></span></a>
                              	</td>
                                <td><?php echo $result['product_name']; ?></td>
                                <td>
                                 			<input class="input-sm" type="number" min="1" max="<?php echo $result['quantity']; ?>" value="<?php echo $rowcart['quantity']; ?>"/>
                                </td>
                                <td>&#8369;<?php echo $rowcart['price']; ?></td>
                                <td><a href="#" class="btn btn-link remove_item" data-trans="<?php echo $rowcart['transaction_id']; ?>" data-id="<?php echo $rowcart['id']; ?>" data-func="remove_yarns"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
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


                              <tr id="<?php echo $rowcart['id']; ?>">
                             	 <td>
                              	<a href="#" data-toggle="popover" title="ACCESSORIES" data-content="
                              	BRAND: <?php echo $result['product_brand']; ?>
                              	"><span class="glyphicon glyphicon-question-sign"></span></a>
                              	</td>
                                <td><?php echo $result['product_name']; ?></td>
                                <td>
                                 			<input class="input-sm" type="number" min="1" max="<?php echo $result['quantity']; ?>" value="<?php echo $rowcart['quantity']; ?>"/>
                                </td>
                                <td>&#8369;<?php echo $rowcart['price']; ?></td>
                                <td><a href="#" class="btn btn-link remove_item" data-trans="<?php echo $rowcart['transaction_id']; ?>" data-id="<?php echo $rowcart['id']; ?>" data-func="remove_accessories"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
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


                              <tr id="<?php echo $rowcart['id']; ?>">
                              	<td>
                              	<a href="#" data-toggle="popover" title="TOOLS" data-content="
                              	BRAND: <?php echo $result['product_brand']; ?>
                              	"><span class="glyphicon glyphicon-question-sign"></span></a>
                              	</td>
                                <td><?php echo $result['product_name']; ?></td>
                                <td>
                                 			<input class="input-sm" type="number" min="1" max="<?php echo $result['quantity']; ?>" value="<?php echo $rowcart['quantity']; ?>"/>
                                </td>
                                <td>&#8369;<?php echo $rowcart['price']; ?></td>
                                <td><a href="#" class="btn btn-link remove_item" data-trans="<?php echo $rowcart['transaction_id']; ?>" data-id="<?php echo $rowcart['id']; ?>" data-func="remove_tools"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
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


                              <tr id="<?php echo $rowcart['id']; ?>">
                             	 <td>
                              	<a href="#" data-toggle="popover" title="YARNS" data-content="
                              	BRAND: <?php echo $result['product_brand']; ?>, CATEGORY: <?php echo $result['product_category']; ?>
                              	"><span class="glyphicon glyphicon-question-sign"></span></a>
                              	</td>
                                <td><?php echo $result['product_name']; ?></td>
                                <td>
                                 			<input class="input-sm" type="number" min="1" max="<?php echo $result['quantity']; ?>" value="<?php echo $rowcart['quantity']; ?>"/>
                                </td>
                                <td>&#8369;<?php echo $rowcart['price']; ?></td>
                                <td><a href="#" class="btn btn-link remove_item" data-trans="<?php echo $rowcart['transaction_id']; ?>" data-id="<?php echo $rowcart['id']; ?>" data-func="remove_project"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
                              </tr>
                <?php
                            }

                    }//projects end


               ?>

            </table>

                  </div>
                  <div class="panel-footer">
                  	<?php
                  		$totalprice = mysqli_query($con,"SELECT SUM(price) AS totprice FROM ootb_temp_transaction WHERE transaction_id='$transaction' AND status='pending'");
                  		$countme = mysqli_fetch_assoc($totalprice);
                  		echo "<center><h3>TOTAL: &#8369;". $countme['totprice']."<h3></center>";

                  		$totalqty = mysqli_query($con,"SELECT SUM(quantity) AS totqty FROM ootb_temp_transaction WHERE transaction_id='$transaction' AND status='pending'");
        				$countmeqty = mysqli_fetch_assoc($totalqty);
                  	 ?>
                  </div>
    			</div>

            </div>
	<div class="col-sm-3">

	<div class="panel panel-primary">
      <div class="panel-heading">PAYPAL</div>
      <div class="panel-body">
			<center><button class="btn btn-primary btn-lg" id="myBtnpaypal">CHECK OUT</a></button>
      </div>
    </div>

    <div class="panel panel-warning">
      <div class="panel-heading">CASH ON DELIVERY</div>
      <div class="panel-body">
			<center><button class="btn btn-warning btn-lg" id="myBtncashon">CHECK OUT</button></center>
      </div>
    </div>


	</div>
   </div>


</div>

<!-- Modal Cassh on Delivery-->
  <div class="modal fade" id="myModalcashon" role="dialog">
    <div class="modal-dialog">
        <form action="<?php echo htmlspecialchars("cashondelivery/cashondelivery_exe.php");?>" method="GET" >
        <input type="hidden" value="<?php echo $countmeqty['totqty'] ; ?>" name="quantity" />
        <input type="hidden" value="<?php echo $countme['totprice'] ; ?>" name="product_price" />
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">CASH ON DELIVERY</h4>
        </div>
        <div class="modal-body">

            <table class="table table-condensed">
              <tr>
                <td>
                    <kbd>Transaction ID: <?php echo $transaction; ?></kbd>
                </td>
                <td>
                    <kbd>Total QTY: <?php echo $countmeqty['totqty']; ?></kbd>
                </td>
                <td>
                    <kbd>Total Price: &#8369; <?php echo $countme['totprice']; ?></kbd>
                </td>
              </tr>
            </table>

        <div class="form-group">
            <label for="fname">First name:</label>
            <input type="text" name="first_name" class="form-control" id="fname" placeholder="First name" required>
          </div>
          <div class="form-group">
            <label for="lname">Last name:</label>
            <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last name" required>
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" class="form-control" required>
              
            </textarea>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="payer_email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact number" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning" >Submit Order</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal Cassh on Delivery-->

<!-- Modal Paypal-->
  <div class="modal fade" id="myModalpaypal" role="dialog">
    <div class="modal-dialog">
        <form class="paypal" action="<?php echo htmlspecialchars("paypal/payments.php");?>" method="post" id="paypal_form">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">PAYPAL</h4>
        </div>
        <div class="modal-body">
       
				<input type="hidden" name="cmd" value="_xclick" />
				<input type="hidden" name="no_note" value="<?php echo $countmeqty['totqty']; ?>" />
				<input type="hidden" name="lc" value="PH" />
				<input type="hidden" name="currency_code" value="PHP" />
				<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
				<input type="hidden" name="item_number" value="<?php echo $transaction; ?>" / >
				<input type="hidden" name="amount" value="<?php echo $countme['totprice']; ?>" / >
				<input type="hidden" name="no_note" value="<?php echo $countmeqty['totqty']; ?>" />


						<table class="table table-condensed">
							<tr>
								<td>
										<kbd>Transaction ID: <?php echo $transaction; ?></kbd>
								</td>
								<td>
										<kbd>Total QTY: <?php echo $countmeqty['totqty']; ?></kbd>
								</td>
								<td>
										<kbd>Total Price: &#8369; <?php echo $countme['totprice']; ?></kbd>
								</td>
							</tr>
						</table>

				<div class="form-group">
			      <label for="fname">First name:</label>
			      <input type="text" name="first_name" class="form-control" id="fname" placeholder="First name" required>
			    </div>
			    <div class="form-group">
			      <label for="lname">Last name:</label>
			      <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last name" required>
			    </div>
			    <div class="form-group">
			      <label for="address">Address:</label>
			      <textarea id="address" name="address" class="form-control" required>
			      	
			      </textarea>
			    </div>
			    <div class="form-group">
			      <label for="email">Email:</label>
			      <input type="text" name="payer_email" class="form-control" id="email" placeholder="Email">
			    </div>

			</form>

        </div>
        <div class="modal-footer">
				<input type="submit" class="btn btn-primary" name="submit" value="Submit Payment"/>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal PAYPAL-->
<script type="text/javascript">
  $('.remove_item').click(function(){

      var func = $(this).attr('data-func');
      var transacid = $(this).attr('data-trans');
      var id = $(this).attr('data-id');
      $.post("remove_exe.php", {func: func, transaction_id: transacid, id: id}, function(result){
        //$("#removeresult").html(result);

      $('#'+id).hide();
    });

  });

  $(document).ready(function(){
    $('[data-toggle="popover"]').popover({placement: "left",trigger: "hover"});   
});

   $("#myBtnpaypal").click(function(){
        $("#myModalpaypal").modal({backdrop: "static"});
    });
    $("#myBtncashon").click(function(){
        $("#myModalcashon").modal({backdrop: "static"});
    });

 </script>
</body>
</html>
