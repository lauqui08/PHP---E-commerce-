<!DOCTYPE html>
<html lang="en">
<?php
 include("../../include/db.php");
 if (isset($_GET['Filter'])) {
     # code...
    if ($_GET['brand']=="all" AND $_GET['color']=="all" AND $_GET['type']=="all" AND $_GET['thickness']=="all") {
        # code...
        header("Location:http://localhost/ootb/admin/yarns/");
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
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <?php include('../../include/header.php'); ?>
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
        <li class="bg-primary"><a href="#">Yarns</a></li>
        <li><a href="../hooks_needles">Hooks and Needles</a></li>
        <li><a href="../accessories">Accessories</a></li>
        <li><a href="../tools">Tools</a></li>
        <li><a href="../projects">Projects</a></li>
        <li><a href="../accounts">Accounts</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#admin"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['login_user']; ?></a></li>
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
<!--FILTER LIST START........................................................................................................................................-->
    <div class="col-sm-2">
            <div class="panel panel-primary">

              <div class="panel-heading">
                <div class="row">
                      <div class="col-sm-8"><b><span class="glyphicon glyphicon-filter"></span> Filter</b></div>
                      <div class="col-sm-4"><a href="http://localhost/ootb/admin/yarns/" class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-refresh"></span></a></div>

                 </div>

              </div>

              <div class="panel-body table-responsive">
                    <?php
                      $filter = mysqli_query($con,"SELECT * FROM `ootb_brands`");
                      $filter2 = mysqli_query($con,"SELECT * FROM `ootb_types`");
                      $filter3 = mysqli_query($con,"SELECT * FROM `ootb_thickness`");
                      $filter4 = mysqli_query($con,"SELECT * FROM `ootb_colors`");
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
                     <label for="filter_color">Color:</label>
                  <select class="form-control filteryarn" id="filter_color">
                       <?php if (isset($_GET['color'])) { ?>
                                <option><?php echo $_GET['color']; ?></option>
                      <?php } ?>
                      <option value="all">All</option>
                    <?php while ($color = mysqli_fetch_assoc($filter4)) { ?>
                      <option value="<?php echo $color['color_name']; ?>"><?php echo $color['color_name']; ?></option>
                    <?php } ?>
                      <option value="multi">Multi</option>
                    </select>

                  </div>

                  <div class="form-group">
                     <label for="filter_color">Type:</label>
                    <select class="form-control filteryarn" id="filter_type">
                       <?php if (isset($_GET['type'])) { ?>
                                <option><?php echo $_GET['type']; ?></option>
                      <?php } ?>
                      <option value="all">All</option>
                    <?php while ($type = mysqli_fetch_assoc($filter2)) { ?>
                      <option><?php echo $type['type_name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                     <label for="filter_color">Thickness:</label>
                    <select class="form-control filteryarn" id="filter_thickness">
                      <?php if (isset($_GET['thickness'])) { ?>
                                <option><?php echo $_GET['thickness']; ?></option>
                      <?php } ?>
                      <option value="all">All</option>
                    <?php while ($thickness = mysqli_fetch_assoc($filter3)) { ?>
                      <option><?php echo $thickness['thickness_name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>

                </form>

              </div>


              <div class="panel-footer"></div>

            </div>
    </div>
<!--FILTER LIST END........................................................................................................................................-->
    <div class="col-sm-10">
      <div class="panel panel-primary">
        <div class="panel-heading">

        <div class="row">
            <div class="col-sm-6">
               <h5>YARNS</h5>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal3" data-backdrop="static"><span class="glyphicon glyphicon-plus-sign"></span> Add New Yarn</button>
            </div>
        </div>

        </div>
        <div class="panel-body table-responsive">
          <table class="table table-condensed table-hover table-bordered">
            <tr>
              <th>SKU</th>
              <th>Name</th>
              <th>Color</th>
              <th>Type</th>
              <th>Thickness</th>
              <th>Brand</th>
              <th>&#8369rice </th>
              <th>Details</th>
              <th>Quantity</th>
              <th>Image</th>
            </tr>

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

                        if ($_GET['color'] == "all") {
                            # code...
                        $pcolor = "";
                        }else{
                        $pcolor = $_GET['color'];
                        }

                        if ($_GET['type'] == "all") {
                            # code...
                        $ptype = "";
                        }else{
                        $ptype = $_GET['type'];
                        }

                        if ($_GET['thickness']== "all") {
                            # code...
                        $pthickness = "";
                        }else{
                        $pthickness = $_GET['thickness'];
                        }

                        $typequery = mysqli_query($con,"SELECT * FROM `ootb_products` WHERE product_brand LIKE'%$pbrand%' AND product_color LIKE'%$pcolor%' AND product_style LIKE'%$ptype%' AND product_thickness LIKE'%$pthickness%'");

                    }else{
                            $typequery = mysqli_query($con,"SELECT * FROM `ootb_products`");
                    }
                            
                            while ($row = mysqli_fetch_assoc($typequery)) { ?>
                            <tr data-toggle="modal" data-target="#myModaledit" class="medit" data-backdrop="static"
                             data-id="<?php echo $row['product_id']; ?>" data-sku="<?php echo $row['product_sku']; ?>" data-name="<?php echo $row['product_name']; ?>" data-color="<?php echo $row['product_color']; ?>" data-style="<?php echo $row['product_style']; ?>" data-thickness="<?php echo $row['product_thickness']; ?>" data-brand="<?php echo $row['product_brand']; ?>" data-price="<?php echo $row['product_price']; ?>" data-quantity="<?php echo $row['product_quantity']; ?>" data-details="<?php echo $row['product_details']; ?>" data-image="<?php echo $row['product_image']; ?>">
                            <td><?php echo $row['product_sku']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td>
                            <?php
                                $xxx = $row['product_color'];
                                $cquery = mysqli_query($con,"SELECT * FROM `ootb_colors` WHERE color_name ='$xxx'");
                                $xcolor = mysqli_fetch_assoc($cquery);
                             ?>
                            <input type="color" value="<?php echo $xcolor['code'];  ?>" disabled/>
                            </td>
                            <td><?php echo $row['product_style']; ?></td>
                            <td><?php echo $row['product_thickness']; ?></td>
                            <td><?php echo $row['product_brand']; ?></td>
                            <td><?php echo $row['product_price']; ?></td>
                            <td><?php echo $row['product_details']; ?></td>
                            <td><?php echo $row['product_quantity']; ?></td>
                            <td>
                                <img src="../../images/<?php echo $row['product_image']; ?>" width="100px">
                            </td>
                            </tr>
                          <?php  }
                           ?>

          </table>
        </div>
        <div class="panel-footer"></div>
      </div>
    </div>

  </div>

</div>
<!--PRODUCT LIST END........................................................................................................................................-->
<hr/>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
      <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars("add_product.php");?>">
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Add New Yarn</h4>
        </div>
        <div class="modal-body">

                  <div class="form-group">
                      <label class="control-label col-sm-3" for="sku">SKU:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="sku" id="sku" placeholder="Product SKU" required/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pname">Name:</label>
                      <div class="col-sm-9"> 
                        <input type="text" class="form-control" name="pname" id="pname" placeholder="Product name" required/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pcolor">Color:</label>
                      <div class="col-sm-9"> 
                        <select class="form-control" name="pcolor" id="pcolor" required/>
                          <option value="">Select Color</option>
                          <?php
                            $colorquery = mysqli_query($con,"SELECT * FROM `ootb_colors`");
                            
                            while ($row = mysqli_fetch_assoc($colorquery)) { ?>
                            <option style="background-color:<?php echo $row['code']; ?>;"><?php echo $row['color_name']; ?></option>
                          <?php  }
                           ?>
                           <option value="multi">MULTI COLOR</option>
                        </select>

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pstyle">Style:</label>
                      <div class="col-sm-9"> 
                        <select class="form-control" name="pstyle" id="pstyle" required/>
                          <option value="">Select Type</option>
                          <?php
                            $typequery = mysqli_query($con,"SELECT * FROM `ootb_types`");
                            
                            while ($row = mysqli_fetch_assoc($typequery)) { ?>
                            <option><?php echo $row['type_name']; ?></option>
                          <?php  }
                           ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pthickness">Thickness:</label>
                      <div class="col-sm-9"> 
                        <select class="form-control" name="pthickness" id="pthickness" required/>
                          <option value="">Select Thickness</option>
                          <?php
                            $thicknessquery = mysqli_query($con,"SELECT * FROM `ootb_thickness`");
                            
                            while ($row = mysqli_fetch_assoc($thicknessquery)) { ?>
                            <option><?php echo $row['thickness_name']; ?></option>
                          <?php  }
                           ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pbrand">Brand:</label>
                      <div class="col-sm-9">
                      <select class="form-control" name="pbrand" id="pbrand" required/>
                        <option value="">Select Brand</option>
                        <?php
                            $brandsquery = mysqli_query($con,"SELECT * FROM `ootb_brands`");
                            
                            while ($row = mysqli_fetch_assoc($brandsquery)) { ?>
                            <option><?php echo $row['brand_name']; ?></option>
                          <?php  }
                           ?>
                      </select> 
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pprice">Price:</label>
                      <div class="col-sm-9"> 

                      <div class="input-group">
                        <span class="input-group-addon">&#8369</span>
                        <input type="number" min="1" class="form-control" name="pprice" id="pprice" required/>
                      </div>


                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pdetails">Description:</label>
                      <div class="col-sm-9"> 
                      <textarea class="form-control" name="pdetails" id="pdetails" required></textarea>
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-sm-3" for="pquantity">Quantity:</label>
                      <div class="col-sm-9"> 
                        <input type="number" min="1" class="form-control" name="pquantity" id="pquantity" required/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pimage">Image:</label>
                      <div class="col-sm-9"> 
                        <input type="text" class="form-control" name="pimage" id="pimage" readonly="readonly" onclick="SelectName()" required/>
                      </div>
                    </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
    </div>




     <!-- Modal Update start...................................................................................................................-->
  <div class="modal fade" id="myModaledit" role="dialog">
    <div class="modal-dialog">
      <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars("update_product.php");?>">
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Update Yarn</h4>
        </div>
        <div class="modal-body">

                  <div class="form-group">
                      <label class="control-label col-sm-3" for="sku">SKU:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="disxsku" disabled/>
                        <input type="hidden" class="form-control" name="sku" id="xsku"/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pname">Name:</label>
                      <div class="col-sm-9"> 
                        <input type="text" class="form-control" name="pname" id="xpname" placeholder="Product name" required/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pcolor">Color:</label>
                      <div class="col-sm-9"> 
                        <select class="form-control" name="pcolor" id="xpcolor" required/>
                          <?php
                            $colorquery2 = mysqli_query($con,"SELECT * FROM `ootb_colors`");
                            
                            while ($row = mysqli_fetch_assoc($colorquery2)) { ?>
                            <option style="background-color:<?php echo $row['code']; ?>;"><?php echo $row['color_name']; ?></option>
                          <?php  }
                           ?>
                        </select>

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pstyle">Style:</label>
                      <div class="col-sm-9"> 
                        <select class="form-control" name="pstyle" id="xpstyle" required/>
                          <?php
                            $typequery = mysqli_query($con,"SELECT * FROM `ootb_types`");
                            
                            while ($row = mysqli_fetch_assoc($typequery)) { ?>
                            <option><?php echo $row['type_name']; ?></option>
                          <?php  }
                           ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pthickness">Thickness:</label>
                      <div class="col-sm-9"> 
                        <select class="form-control" name="pthickness" id="xpthickness" required/>
                          <?php
                            $thicknessquery = mysqli_query($con,"SELECT * FROM `ootb_thickness`");
                            
                            while ($row = mysqli_fetch_assoc($thicknessquery)) { ?>
                            <option><?php echo $row['thickness_name']; ?></option>
                          <?php  }
                           ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pbrand">Brand:</label>
                      <div class="col-sm-9">
                      <select class="form-control" name="pbrand" id="xpbrand" required/>
                        <?php
                            $brandsquery = mysqli_query($con,"SELECT * FROM `ootb_brands`");
                            
                            while ($row = mysqli_fetch_assoc($brandsquery)) { ?>
                            <option><?php echo $row['brand_name']; ?></option>
                          <?php  }
                           ?>
                      </select> 
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pprice">Price:</label>
                      <div class="col-sm-9"> 
                        <input type="number" min="1" class="form-control" name="pprice" id="xpprice" required/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pdetails">Description:</label>
                      <div class="col-sm-9"> 
                      <textarea class="form-control" name="pdetails" id="xpdetails" required></textarea>
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-sm-3" for="pquantity">Quantity:</label>
                      <div class="col-sm-9"> 
                        <input type="number" min="1" class="form-control" name="pquantity" id="xpquantity" required/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pimage">Image:</label>
                      <div class="col-sm-9"> 
                        <input type="text" class="form-control" name="pimage" id="xpimage" readonly="readonly" onclick="SelectName()" required/>
                      </div>
                    </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="update">Update</button> <a href="#" id="pdelete" class="btn btn-danger">Delete</a> <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      </form>
    </div>
    </div>

      <script type="text/javascript">
        var popup;
        function SelectName() {
            popup = window.open("product_image.php", "Popup", "width=400,height=400");
            popup.focus();
            return false
        }

        $('.medit').click(function(){
            var id  = $(this).attr('data-id');
            var sku  = $(this).attr('data-sku');
            var name  = $(this).attr('data-name');
            var color  = $(this).attr('data-color');
            var style  = $(this).attr('data-style');
            var thickness = $(this).attr('data-thickness');
            var brand = $(this).attr('data-brand');
            var price = $(this).attr('data-price');
            var quantity = $(this).attr('data-quantity');
            var details = $(this).attr('data-details');
            var image = $(this).attr('data-image');


            $('#xsku').val(sku);
              $('#disxsku').val(sku);
            $('#xpname').val(name);
            $('#xpcolor').val(color);
            $('#xpstyle').val(style);
            $('#xpthickness').val(thickness);
            $('#xpbrand').val(brand);
            $('#xpprice').val(price);
            $('#xpdetails').val(details);
            $('#xpquantity').val(quantity);
            $('#xpimage').val(image);
            $('#pdelete').attr("href","delete_product.php?id="+id);
        });

        //filter_brand
        //filter_color
        //filter_type
        //filter_thickness
        $(".filteryarn").change(function(){
        var brand = $("#filter_brand").val();
        var color = $("#filter_color").val();
        var type = $("#filter_type").val();
        var thickness = $("#filter_thickness").val();

        $(location).attr('href', 'http://localhost/ootb/admin/yarns/?Filter&brand='+brand+'&type='+type+'&thickness='+thickness+'&color='+color);

        });


      </script>

</body>
</html>
