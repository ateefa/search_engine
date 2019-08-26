<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "search");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name

  	$site_image = $_FILES['site_image']['name'];
  	// Get text
  	$site_title = mysqli_real_escape_string($db, $_POST['site_title']);
    $site_link = mysqli_real_escape_string($db, $_POST['site_link']);
    $site_keyword = mysqli_real_escape_string($db, $_POST['site_keyword']);
    $site_desc = mysqli_real_escape_string($db, $_POST['site_desc']);

  	// image file directory
  	$target = "images/".basename($site_image);

  	$sql = "INSERT INTO image (site_title,site_link,site_keyword,site_image, site_desc) VALUES ('$site_title', '$site_link','$site_keyword', '$site_image','$site_desc')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['site_image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM image");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">

  <form method="POST" action="insert_site.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="text" name="site_title">
  	</div>
    <div>
  	  <input type="text" name="site_link">
  	</div>
    <div>
  	  <input type="text" name="site_keyword">
  	</div>
    <div>
  	  <input type="file" name="site_image">
  	</div>
  	<div>
      <textarea
      	id="text"
      	cols="40"
      	rows="4"
      	name="site_desc"
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>
