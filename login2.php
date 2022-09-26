<?php
require_once "database.php";
require_once "checker.php";

if(isset( $_POST["submit"] ) ) {
	
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  loginUser($conn, $username, $password);
  
} else {
	
  header("location: login.php?error=nomatch");
  exit();
  
}
 ?>
