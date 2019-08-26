<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    .results{margin-left:12px;margin}
    </style>
  </head>
  <body bgcolor="#f5deb3">
    <form bgcolor="" class="" action="results.php" method="get">
      <span> <b>YOUR KEYWORDS </b> </span>
      <input type="text" name="user_keyword" size="80" value="">
      <input type="submit" name="result" value="SearchnoW">
      <button><a href="search.html">GO BACK</a></button>
    </form>
<?php
  $db = mysqli_connect("localhost", "root", "", "search");
  if($db){
    if(isset($_GET['search'])){
      $get_value = $_REQUEST['user_query'];
      $result_query="SELECT * FROM image WHERE site_keyword LIKE '%$get_value'";
      $result=mysqli_query($db,$result_query);
      //$run_result = mysqli_query($db,$result_query);
      while($row = mysqli_fetch_array($result))
{     echo"in";
        $site_title = $row['site_title'];
        $site_link = $row['site_link'];
        $site_desc = $row['site_desc'];
        $site_image = $row['site_image'];

        echo"<div class='result'>
          <h2>$site_title</h2>
          <a href='$site_link' target='_blank'>$site_link</a>
          <p align='justify'>$site_desc</p>
          <img src='images/$site_image' width='100'  hieght='100'/>
        </div>";

      }

    }
  }
  else{echo"error";}

?>

  </body>
</html>
