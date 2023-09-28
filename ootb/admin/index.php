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
    <?php include('../include/header.php'); ?>
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
        <li><a href="accounts">Accounts</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#admin"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['login_user']; ?></a></li>
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

</body>
</html>
