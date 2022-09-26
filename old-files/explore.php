<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="main.css">
</head>
<body>
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
    <center>
      <h1 id="title">Explore</h1>
    </center>
  </br>
  <div class="container">
    <?php
    echo "<center>";
    $username = $_SESSION["usersName"];
    require("database.php");
    require("checker.php");
    getAllImages($conn, $username);
    echo "</center>";
     ?>
  </div>
</html>
