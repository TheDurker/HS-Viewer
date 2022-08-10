<!DOCTYPE html>
<html lang = "en">
<head>
<title>test Viewer</title>
	<meta charset = "UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name"viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="cc/style.css">
</head>
<body>
<?php
  $dbh = new PDO("mysql:host=localhost;dbname=hsviewer","root","");
?>


<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="myfile" id="myfile">
  <input type="submit" value="Upload Image" name="submit">
</form>

<p></p>
<ol>
    <?php
    	$stat = $dbh->prepare("select * from myblob");
    	$stat->execute();
        while($row = $stat->fetch()){
        	echo "<li><a href='download.php?id=".$row['id']."'>".$row['name']."</a></li>";
        }
     ?>
</ol>

<p></p>

<img src="Big_Mac_hamburger.jpg" alt="Borgir">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cndjs.cloudflare.com/ajax/libs/popper.js/1.160/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>