  <?php
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  //gives access to php files
  require_once "database.php";
  require_once "checker.php";

  loginUser($conn, $username, $password);
}
else {
  header("location: login.php?error=nomatch");
  exit();
}
 ?>
