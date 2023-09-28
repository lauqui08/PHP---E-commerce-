<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Product Image</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

		<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

		  <div class="form-group">
		    <label for="email">Choose an Image for your product:</label>
		    <input type="file" name="fileToUpload" id="fileToUpload" class="btn">
		  </div>

		  <div class="form-group">
		    <input type="submit" value="Upload Image" name="submit" class="btn" onclick="SetName();">
		  </div>

		</form>

<?php
error_reporting(0);
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}

if (isset($_POST['submit'])) { ?>
	<img src="<?php echo "../../images/".basename( $_FILES["fileToUpload"]["name"]); ?>" width="300px"/>
	<div>This window will closed in <span id="time">00:30</span> seconds!</div>
<?php }

?>


</div>

<script type="text/javascript">

 function SetName() {
        if (window.opener != null && !window.opener.closed) {
            var pimage = window.opener.document.getElementById("pimage");
            var xpimage = window.opener.document.getElementById("xpimage");

            pimage.value = document.getElementById("fileToUpload").value.replace(/^.*[\\\/]/, '');
            xpimage.value = document.getElementById("fileToUpload").value.replace(/^.*[\\\/]/, '');
        }
        //window.close();
    }

$(document).ready(function(){

        function startTimer(duration, display) {
		    var timer = duration, minutes, seconds;
		    setInterval(function () {
		        minutes = parseInt(timer / 60, 10)
		        seconds = parseInt(timer % 60, 10);

		        minutes = minutes < 10 ? "0" + minutes : minutes;
		        seconds = seconds < 10 ? "0" + seconds : seconds;

		        display.text(minutes + ":" + seconds);

		        if (--timer < 0) {
		            timer = duration;
		            window.close();

		        }
		    }, 1000);
		}

    jQuery(function ($) {
		    var thirtySeconds = 30,
		        display = $('#time');
		    startTimer(thirtySeconds, display);

		});

});

</script>

</body>
</html>