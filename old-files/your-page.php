<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <p>
    <div>
      .
    </div>
  </p>
  <div class="banner">
    <img class="logo" img src="lens.png" alt="Logo">
    <h2>
      <?php
        session_start();
        if (isset($_SESSION["userId"])) {
          echo "<a href='your-page.php' style='float: left;'>" . $_SESSION["usersName"] . "'s page</a>";
          echo "<a href='explore.php' style='margin-left: -20%;'>Explore</a>";
          echo "<a href='logout.php' style='float: right;'>Log out</a>";
        }
       ?>
    </h2>
    <input id="search" type="text" placeholder="Search..." name="search">
    <img class="searchimage" img src="search-lens.png" alt="search-lens">
  </div>
  <br>
  </br>
  <center>
  <div class="container">
<?php
    if (isset($_SESSION["userId"])) {
      $username = $_SESSION["usersName"];
      require("database.php");
      require("checker.php");
      getImages($conn, $username);
    }
?>
  </div>
</center>
<form action="upload.php" method="post" enctype="multipart/form-data">
<input style="float: left; width: 100px; height: 40px;" type="File" name="file"></input>
<button style="margin-left: -10px; float: left; width: 60px; height: 20px;" type="submit" name="submit">upload</button>
</form>
<button style="float: right; width: 60px; height: 30px;" type="button" name="delete">Delete</button>
</body>
</html>
