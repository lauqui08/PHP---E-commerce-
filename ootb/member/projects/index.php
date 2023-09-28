<!DOCTYPE html>
<html lang="en">
<?php
 include("../../include/db.php");
 if (isset($_GET['Filter'])) {
     # code...
    if ($_GET['brand']=="all" AND $_GET['category']=="all") {
        # code...
        header("Location:http://localhost/ootb/member/projects/");
    }
 }
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
  <script type="text/javascript">
    function select_all()
    {
    var text_val=eval("document.form_name.type");
    text_val.focus();
    text_val.select();
    }
  </script>
</head>
<body>

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
        <li><a href="../">Home</a></li>
        <li><a href="../yarns">Yarns</a></li>
        <li><a href="../hooks_needles">Hooks and Needles</a></li>
        <li><a href="../accessories">Accessories</a></li>
        <li><a href="../tools">Tools</a></li>
        <li class="bg-warning"><a href="#">Projects</a></li>
        <li><a href="#transaction">Transactions</a></li>
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
          <a href="../../include/logout_exe.php">
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
    <div class="col-sm-2">
            <div class="panel panel-warning">

              <div class="panel-heading">
                <div class="row">
                      <div class="col-sm-8"><b><span class="glyphicon glyphicon-filter"></span> Filter</b></div>
                      <div class="col-sm-4"><a href="http://localhost/ootb/member/projects/" class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-refresh"></span></a></div>

                 </div>

              </div>

              <div class="panel-body table-responsive">
                    <?php
                      $filter = mysqli_query($con,"SELECT * FROM `ootb_brands`");
                      $filter2 = mysqli_query($con,"SELECT * FROM `ootb_projects_category`");
                    ?>
                <form>
                  <div class="form-group">
                     <label for="filter_brand">Brand:</label>
                    <select class="form-control filteryarn" id="filter_brand">
                      <?php if (isset($_GET['brand'])) { ?>
                                <option><?php echo $_GET['brand']; ?></option>
                      <?php } ?>
                      <option value="all">All</option>
                    <?php while ($brand = mysqli_fetch_assoc($filter)) { ?>
                      <option><?php echo $brand['brand_name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                     <label for="filter_color">Category:</label>
                    <select class="form-control filteryarn" id="filter_type">
                       <?php if (isset($_GET['category'])) { ?>
                                <option><?php echo $_GET['category']; ?></option>
                      <?php } ?>
                      <option value="all">All</option>
                    <?php while ($type = mysqli_fetch_assoc($filter2)) { ?>
                      <option><?php echo $type['category_name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>

                </form>

              </div>


              <div class="panel-footer"></div>

            </div>
    </div>

    <div class="col-sm-10">
    

  <div class="row"> 
  <?php
                       if (isset($_GET['Filter'])) {
                        # code...
                        //$pcolor = $_GET['color'];
                        //$ptype = $_GET['type'];
                        //$pthickness = $_GET['thickness'];

                        if ($_GET['brand'] == "all") {
                            # code...
                        $pbrand = "";
                        }else{
                        $pbrand = $_GET['brand'];
                        }

                        if ($_GET['category'] == "all") {
                            # code...
                        $ptype = "";
                        }else{
                        $ptype = $_GET['category'];
                        }


                        $prodlist = mysqli_query($con,"SELECT * FROM `ootb_projects` WHERE product_brand LIKE'%$pbrand%' AND product_category LIKE'%$ptype%'");

                    }else{
                            $prodlist = mysqli_query($con,"SELECT * FROM `ootb_projects`");
                    }
    while ($row = mysqli_fetch_assoc($prodlist)) { ?>
    <div class="col-sm-4">
      <div class="panel panel-warning">
        <div class="panel-heading"><span class="text-uppercase"><strong><?php echo $row['product_name']; ?></strong></span><span class="pull-right"><kbd>&#8369;<?php echo $row['product_price']; ?></kbd></span></div>
        <div class="panel-body"><img src="../../images/<?php echo $row['product_image']; ?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">

          <div class="row">
            <div class="col-sm-8">
              <form action="<?php echo htmlspecialchars("transaction_exe.php");?>" method="GET">
                <div class="input-group">
                    <input type="hidden" name="username" value="<?php echo $_SESSION['login_user']; ?>">
                    <input type="hidden" name="product_sku" value="<?php echo $row['product_sku']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                    <input type="hidden" name="return_url" value='<?php $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; echo $url; ?>' />
                    <input class="form-control" name="quantity" type="number" placeholder="<?php echo $row['product_quantity']; ?>" min="1" max="<?php echo $row['product_quantity']; ?>" required>
                <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="addtocart"><span class="glyphicon glyphicon-shopping-cart"></span> Add </button>
                </div>
                </div>
              </form>
            </div>
            <div class="col-sm-4">
                <a href="" class="btn btn-info viewprod" data-toggle="modal" data-target="#myModaledit" data-backdrop="static"
                             data-id="<?php echo $row['product_id']; ?>" data-sku="<?php echo $row['product_sku']; ?>" data-name="<?php echo $row['product_name']; ?>" data-style="<?php echo $row['product_category']; ?>" data-brand="<?php echo $row['product_brand']; ?>" data-price="<?php echo $row['product_price']; ?>" data-quantity="<?php echo $row['product_quantity']; ?>" data-details="<?php echo $row['product_details']; ?>" data-image="<?php echo $row['product_image']; ?>">Info...</a>
            </div>
            
          </div>

        </div>
      </div>

    </div>
    <?php } ?>
  </div>


	</div>
</div>

</div>
<!--PRODUCT LIST END........................................................................................................................................-->
<br>

<hr/>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>



     <!-- Modal Quick View start...................................................................................................................-->
  <div class="modal fade" id="myModaledit" role="dialog">
    <div class="modal-dialog">
      <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars("update_product.php");?>">
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title"><span id="xsku"></span></h4>
        </div>
        <div class="modal-body table-responsive">

              <form class="form-horizontal">

                <div class="form-group">
                  <label class="control-label col-sm-4" for="name">Product Name:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static" id="xpname"></p>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-4" for="style">Category:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static" id="xpstyle"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4" for="brand">Brand:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static" id="xpbrand"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4" for="description">Description:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static" id="xpdetails"></p>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-4" for="stock">Stock:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static" id="xpquantity"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4" for="price">Price:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">&#8369;<span id="xpprice"></span></p>
                  </div>
                </div>

              </form>

        </div>
        <div class="modal-footer">

          <div class="row">

            <div class="col-sm-7"></div>

            <div class="col-sm-5">
              <form action="<?php echo htmlspecialchars("transaction_exe.php");?>" method="GET">
                <div class="input-group">
                    <input type="hidden" name="username" value="<?php echo $_SESSION['login_user']; ?>">
                    <input type="hidden" name="product_sku" id="disxsku" />
                    <input type="hidden" name="product_price" id="xpprice2" />
                    <input type="hidden" name="return_url" value='<?php $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; echo $url; ?>' />
                    <input class="form-control" name="quantity" type="number" id="pxpquantity" min="1" required>
                <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="addtocart"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>
                </div>
                </div>
              </form>
            </div>

          </div>
          
        </div>
      </div>
      </form>
    </div>
    </div>
     <!-- Modal Quick View end...................................................................................................................-->

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
   $('.viewprod').click(function(){
            var id  = $(this).attr('data-id');
            var sku  = $(this).attr('data-sku');
            var name  = $(this).attr('data-name');
            var style  = $(this).attr('data-style');
            var brand = $(this).attr('data-brand');
            var price = $(this).attr('data-price');
            var quantity = $(this).attr('data-quantity');
            var details = $(this).attr('data-details');
            var image = $(this).attr('data-image');


            $('#xsku').text(sku);
              $('#disxsku').val(sku);
            $('#xpname').text(name);
            $('#xpstyle').text(style);
            $('#xpbrand').text(brand);
            $('#xpprice').text(price);
              $('#xpprice2').val(price);
            $('#xpdetails').text(details);
            $('#xpquantity').text(quantity);
              $('#pxpquantity').attr('placeholder',quantity);
              $('#pxpquantity').attr('max',quantity);
            $('#xpimage').text(image);
            //$('#pdelete').attr("href","delete_product.php?id="+id);
        });

   $(".filteryarn").change(function(){
        var brand = $("#filter_brand").val();
        var type = $("#filter_type").val();

        $(location).attr('href','http://localhost/ootb/member/projects/?Filter&brand='+brand+'&category='+type);

        });

   $('.remove_item').click(function(){

      var func = $(this).attr('data-func');
      var transacid = $(this).attr('data-trans');
      var id = $(this).attr('data-id');
      $.post("../../include/remove_exe.php", {func: func, transaction_id: transacid, id: id}, function(result){
        //$("#removeresult").html(result);

      $('#'+id).hide();
    });

  });

  $('.close').click(function(){
      location.reload();
  });

  function openPayment() {
    paymentWindow = window.open("../../include/purchase.php", "paymentWindow", "width=1350,height=1000");
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
