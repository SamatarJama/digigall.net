<?php
session_start();
require_once "database.php";
require_once 'checker.php';
//
if (isset($_GET['image'])) {
  $delImg = $_GET['image'];
  $query = "DELETE FROM images WHERE image = '$delImg' ;";
  $query_run = mysqli_query($conn, $query);
  if ($query_run){
    ?>
    <script>
    alert("the image has been removed");
    window.location.href ='your-page.php';
    </script>
    <?php
    mysqli_fetch_array($query_run);
    unlink("$delImg");
  }
  else {
    ?>
    <script>
    alert("the image did not get removed");
    window.location.href ='your-page.php?error';
    </script>
    <?php
  }
}

 ?>
