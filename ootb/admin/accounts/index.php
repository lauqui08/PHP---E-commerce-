<!DOCTYPE html>
<html lang="en">
<?php include("../../include/db.php"); ?>
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
        <li><a href="../yarns">Yarns</a></li>
        <li><a href="../hooks_needles">Hooks and Needles</a></li>
        <li><a href="../accessories">Accessories</a></li>
        <li><a href="../tools">Tools</a></li>
        <li><a href="../projects">Projects</a></li>
        <li class="active"><a href="#">Accounts</a></li>
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

<!--ACCOUNTS LIST START........................................................................................................................................-->
<div class="container">  
  <div class="row">

    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">ACCOUNTS</div>
        <div class="panel-body table-responsive">

          <table class="table table-condensed table-hover table-bordered">
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Name</th>
                <th>Birth date</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Photo</th>
              </tr>

                        <?php
                            $accountquery = mysqli_query($con,"SELECT * FROM `ootb_account` WHERE type != 'admin'");
                            while ($row = mysqli_fetch_assoc($accountquery)) { ?>
                            <tr data-toggle="modal" data-target="#myModal3" data-backdrop="static" class="aedit"
                            data-id="<?php echo $row['id']; ?>" data-accountnumber="<?php echo $row['account_number']; ?>" data-username="<?php echo $row['username']; ?>" data-email="<?php echo $row['email']; ?>" data-password="<?php echo $row['password']; ?>" data-fullname="<?php echo $row['fullname']; ?>" data-birthdate="<?php echo $row['birthdate']; ?>" data-gender="<?php echo $row['gender']; ?>" data-address="<?php echo $row['address']; ?>" data-contact1="<?php echo $row['contact_number1']; ?>" data-contact2="<?php echo $row['contact_number2']; ?>" data-fbaccount="<?php echo $row['fb_account']; ?>" data-photo="<?php echo $row['photo']; ?>">
                              <td><?php echo $row['username']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['fullname']; ?></td>
                              <td><?php echo $row['birthdate']; ?></td>
                              <td><?php echo $row['gender']; ?></td>
                              <td><?php echo $row['address']; ?></td>
                              <td><?php echo $row['contact_number1']; ?></td>
                              <td><?php echo $row['photo']; ?></td>
                            </tr>
                        <?php } ?>
          </table>
        </div>
        <div class="panel-footer"></div>
      </div>
    </div>

  </div>
</div>
<!--ACCOUNTS LIST END........................................................................................................................................-->
<br>

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
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Manage Account</h4>
        </div>
        <div class="modal-body">

            <ul class="list-group">
              <li class="list-group-item">Account number <span class="badge" id="accnum"></span></li>
              <li class="list-group-item">Username <span class="badge" id="uname"></span></li> 
              <li class="list-group-item">Email <span class="badge" id="iemail"></span></li> 
              <li class="list-group-item">Password <span class="badge" id="passw"></span></li> 
              <li class="list-group-item">Fullname <span class="badge" id="fulln"></span></li> 
              <li class="list-group-item">Birth date <span class="badge" id="bdate"></span></li> 
              <li class="list-group-item">Gender <span class="badge" id="gend"></span></li> 
              <li class="list-group-item">Address <span class="badge" id="addre"></span></li> 
              <li class="list-group-item">Primary contact <span class="badge" id="pricon"></span></li> 
              <li class="list-group-item">Secondary contact <span class="badge" id="secon"></span></li> 
              <li class="list-group-item">Facebook <span class="badge" id="fbacc"></span></li> 
              <li class="list-group-item">Photo <span class="badge" id="phot"></span></li> 
            </ul>

        </div>
        <div class="modal-footer">
          <a href="" class="btn btn-success">View Transaction/s</a> <a href="" class="btn btn-warning" id="delacc">Delete Account</a> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
<script type="text/javascript">
          $('.aedit').click(function(){

            var id = $(this).attr('data-id');
            var account_number = $(this).attr('data-accountnumber');
            var username = $(this).attr('data-username');
            var email = $(this).attr('data-email');
            var password = $(this).attr('data-password');
            var fullname = $(this).attr('data-fullname');
            var birthdate = $(this).attr('data-birthdate');
            var gender = $(this).attr('data-gender');
            var address = $(this).attr('data-address');
            var contact1 = $(this).attr('data-contact1');
            var contact2 = $(this).attr('data-contact2');
            var fb_account = $(this).attr('data-fbaccount');
            var photo = $(this).attr('data-photo');


            $('#accnum').text(account_number);
            $('#uname').text(username);
            $('#iemail').text(email);
            $('#passw').text(password);
            $('#fulln').text(fullname);
            $('#bdate').text(birthdate);
            $('#gend').text(gender);
            $('#addre').text(address);
            $('#pricon').text(contact1);
            $('#secon').text(contact2);
            $('#fbacc').text(fb_account);
            $('#phot').text(photo);
            $('#delacc').attr('href','delete_account.php?id='+id);


        });
</script>
</body>
</html>
