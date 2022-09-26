<?php
//checks if the user pessed the button to get here
if (isset($_POST["submit"])) {
  $name = $_POST["fullname"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $password2 = $_POST["password2"];

  //gives access to php files
  require_once "database.php";
  require_once "checker.php";

  if (dataExist($conn, $email, $username) !== false) {
    header("location: register.php?error=dataexist");
    echo "<br>1<br>";
    exit();
  }

  if (passwordChecker($password, $password2) !== false) {
    header("location: register.php?error=dissimilarpassword");
    echo "<br>2<br>";
    exit();
  }


  createUser($conn, $name, $email, $username, $password);

}
//sends back if not
else {
  header("location: register.php");
  echo "<br>3<br>";
}
?>
