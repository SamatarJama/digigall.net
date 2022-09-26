<?php
session_start();
require_once "database.php";
require_once "checker.php";

$username = $_SESSION["usersName"];
$directory = "images/";
$target_file = $directory . basename($_FILES["file"]["name"]);
$checker = true;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// testif image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $test= getimagesize($_FILES["file"]["tmp_name"]);
  if($test!== false) {
    $checker = true;
  } else {
    echo "An images was not handed in.";
    $checker = false;
  }
}

//checks if it's the right file format
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
&& $fileType != "gif" ) {
  echo "not a correct file format uploaded";
  $checker = false;
}

//checks if any error was found through the checker
if ($checker == false) {
  echo "File was not uploaded.";
} else {
  //assigns random number to file
  if (true) {
    $rand = rand();
    $target_file= $directory . $rand . basename($_FILES["file"]["name"]);
  }
  //checks if the file is unique
  while (file_exists(target_file)){
    $target_file= $directory . $rand . basename($_FILES["file"]["name"]);
  }
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    uploadImage($conn, $username, $target_file);
  } else {
    echo "error uploading file.";
  }
}
?>
