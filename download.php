<?php
$connection =  mysqli_connect("localhost","root","","hsviewer")
               or die('Database Connection Failed');

mysqli_set_charset($connection,'utf8mb4');

$id = isset($_GET['id'])? $_GET['id'] : "";
// Use a prepared statement in production to avoid SQL injection;
// we can get away with this here because we're the only ones who
// are going to use this script.
$query = "SELECT * " ."FROM myblob WHERE id = '$id'";
$result = mysqli_query($connection,$query) 
       or die('Error, query failed');
list($id, $file, $type, $size,$content) = mysqli_fetch_array($result);
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$file");
ob_clean();
flush();
echo $size;
echo $content;
mysqli_close($connection);
exit;

?>