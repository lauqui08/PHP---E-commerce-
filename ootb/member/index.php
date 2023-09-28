<!DOCTYPE html>
<html lang="en">
<?php include("../include/db.php"); ?>
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

    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
    }
      /* Popover */
  .popover {
      border: 1px inset #000000;
  }
  /* Popover Header */
  .popover-title {
      background-color: #696969; 
      color: #FFFFFF; 
      font-size: 12px;
      text-align:center;
  }
  /* Popover Body */
  .popover-content {
      background-color: #778899;
      color: #FFFFFF;
      padding: 5px;
  }
  /* Popover Arrow */
  .arrow {
      border-right-color: red !important;
  }
  </style>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=147036832072741";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="jumbotron">
  <div class="container text-center">
    <h1>Online Store</h1>      
    <p>Out of the BOX</p>
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="yarns">Yarns</a></li>
        <li><a href="hooks_needles">Hooks and Needles</a></li>
        <li><a href="accessories">Accessories</a></li>
        <li><a href="tools">Tools</a></li>
        <li><a href="projects">Projects</a></li>
        <li><a href="#transactions">Transactions</a></li>
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
        <li><a href="#member"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['login_user']; ?></a></li>
        <li>
          <a href="../include/logout_exe.php">
          <span class="glyphicon glyphicon-log-out"></span>
           Logout
           </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--PRODUCT LIST START........................................................................................................................................-->
<div class="container"> 
  <div class="row">

    <div class="col-sm-8">


            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="../images/1.jpg" alt="Chania" width="460" height="345">
                </div>

                <div class="item">
                  <img src="../images/2.jpg" alt="Chania" width="460" height="345">
                </div>
              
                <div class="item">
                  <img src="../images/3.jpg" alt="Flower" width="460" height="345">
                </div>

                <div class="item">
                  <img src="../images/4.jpg" alt="Flower" width="460" height="345">
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

            </div>
    


    <div class="col-sm-4">

      <div class="fb-page" data-href="https://www.facebook.com/Free-php-thesis-401877260143922/?ref=bookmarks" data-width="340" data-hide-cover="false" data-show-facepile="true"></div>

      </div>

  </div>
</div>
<!--PRODUCT LIST END........................................................................................................................................-->
<br>

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
        <div class="modal-body table-responsive" >

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
                                      <?php echo $rowcart['quantity']; ?>
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
                                      <?php echo $rowcart['quantity']; ?>
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
                                      <?php echo $rowcart['quantity']; ?>
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
                                      <?php echo $rowcart['quantity']; ?>
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
                                      <?php echo $rowcart['quantity']; ?>
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
      <div class="modal-footer">
      <?php
            $countrecord = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND status='pending'");
            $count = mysqli_num_rows($countrecord);

              if ($count == 0) {
                # code...
                echo "Empty Cart";
              }else{

             ?>
            Transaction ID: <?php echo $_SESSION['transaction_session']; ?>
            <button type="button" onclick="openPayment()" class="btn btn-primary mypurchace">Purchase</button>

            <?php } ?>
      </div>
    </div>
     <!-- Modal My Cart end...................................................................................................................-->
<script type="text/javascript">
  $('.remove_item').click(function(){

      var func = $(this).attr('data-func');
      var transacid = $(this).attr('data-trans');
      var id = $(this).attr('data-id');
      $.post("../include/remove_exe.php", {func: func, transaction_id: transacid, id: id}, function(result){
        //$("#removeresult").html(result);

      $('#'+id).hide();
    });

  });

  $('.close').click(function(){
      location.reload();
  });


  function openPayment() {
    paymentWindow = window.open("../include/purchase.php", "paymentWindow", "width=1350,height=1000");
  }

  function closeWin() {
      paymentWindow.close();
  }

 $(document).ready(function(){
    $('[data-toggle="popover"]').popover({placement: "right",trigger: "hover"});   
});

</script>

</body>
</html>
