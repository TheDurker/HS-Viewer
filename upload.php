<?php   
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["myfile"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
if($uploadOk == 1)
{
  $dbh = new PDO("mysql:host=localhost;dbname=hsviewer","root","");
    if (isset($_POST['submit'])){
      $name = $_FILES['myfile']['name'];
      $type = $_FILES['myfile']['type'];
	    $data = file_get_contents($_FILES['myfile']['tmp_name']);
      $stmt = $dbh->prepare("insert into myblob values('',?,?,?)");
      $stmt->bindParam(1,$name);
      $stmt->bindParam(2,$type);
      $stmt->bindParam(3,$data);
      $stmt->execute();

    }
}

?>