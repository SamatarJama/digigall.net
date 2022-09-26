<?php
//gives access to php files
require_once "database.php";
require_once "checker.php";

//checks if the user pessed the button to get here
if (isset($_POST["submit"])) {

  $name = $_POST["fullname"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $password2 = $_POST["password2"]; 
  
  if (dataExist($conn, $email, $username) !== false) {
    header("location: login.php?error=dataexist");
    exit();
  }

  if (passwordChecker($password, $password2) !== false) {
    header("location: login.php?error=dissimilarpassword");
    exit();

  }


  createUser($conn, $name, $email, $username, $password);


}
//sends back if not
else {
  header("location: login.php");
}
?>
