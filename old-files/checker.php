<?php
//checks if inputed passwords are the same
function passwordChecker($password, $password2){
  $boolean;
  if ($password !== $password2){
    $boolean = true;
  }
  else {
    $boolean = false;
  }
  return $boolean;
}

function dataExist($conn, $email, $username){
  $sql = "SELECT * FROM users WHERE email = ? OR usersName = ? ;";
  $preparedStatement = mysqli_stmt_init($conn);
  //checks if there is something wrong with the sql statement (protection from array sql injection)
  if (!mysqli_stmt_prepare($preparedStatement, $sql)) {
    header("location: register.php?error=sqlfailure");
    exit();
  }
  mysqli_stmt_bind_param($preparedStatement, "ss", $email, $username);
  mysqli_stmt_execute($preparedStatement);

  $databaseChecker = mysqli_stmt_get_result($preparedStatement);

  if ($row = mysqli_fetch_assoc($databaseChecker)) {
      return $row;
  }
  else {
    $boolean = false;
    return $boolean;
  }

  mysqli_stmt_close($preparedStatement);
}


function createUser($conn, $name, $email, $username, $password){
  $sql = "INSERT INTO users (fullName, email, usersName, usersPassword) VALUES (?, ?, ?, ?);";
  $preparedStatement = mysqli_stmt_init($conn);
  //checks if there is something wrong with the sql statement (protection from array sql injection)
  if (!mysqli_stmt_prepare($preparedStatement, $sql)) {
    header("location: register.php?error=sqlfailure");
    exit();
  }
  //hashes password for encryption
  $hashed = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($preparedStatement, "ssss", $name, $email, $username, $hashed);
  mysqli_stmt_execute($preparedStatement);

  mysqli_stmt_close($preparedStatement);
  header("location: login.php?error=none");
  exit();
}

  function loginUser($conn, $username, $password) {
    $dataExist = dataExist($conn, $username, $username);

    if ($dataExist === false) {
      header("location: login.php?error=nomatch");
      exit();
    }
    $hashed = $dataExist['usersPassword'];
    if (!password_verify($password, $hashed)) {
      header("location: login.php?error=nomatch");
      exit();
    }
    else if (password_verify($password, $hashed)) {
      //make session so that we can use universal variables to interact with the user
      session_start();
      $_SESSION["userId"] = $dataExist["usersId"];
      $_SESSION["usersName"] = $dataExist["usersName"];
      header("location: your-page.php?error=none");
      exit();
    }
  }

  function uploadImage($conn, $username, $target_file){
    $sql = "INSERT INTO images (usersName, image) VALUES (?, ?);";
    $preparedStatement = mysqli_stmt_init($conn);
    //checks if there is something wrong with the sql statement (protection from array sql injection)
    if (!mysqli_stmt_prepare($preparedStatement, $sql)) {
      header("location: your-page.php?error=sqlfailure");
      exit();
    }

    mysqli_stmt_bind_param($preparedStatement, "ss", $username, $target_file);
    mysqli_stmt_execute($preparedStatement);

    mysqli_stmt_close($preparedStatement);
    header("location: your-page.php?error=none");
    exit();
  }
  //gets the username and retrieves all the images connected to that user throught a query, and the outputs it through some html tags
  function getImages($conn, $username){
    echo "<link rel='stylesheet' href='main.css'>";
    $query = "SELECT * FROM images WHERE usersName = '$username';";
    $query_run = mysqli_query($conn, $query);
    $counter = 0;
    echo "<table>";
    echo "<center>";
    echo "<tr>";
    while ($row = mysqli_fetch_array($query_run)) {
      if ($counter === 2) {
        echo "<center>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        echo "<div id='imagebox'> ";
        //$row['image'] gets the correct variable and outputs good in the img tag, but in the a link the variable gets altered and the images does not get deleted therfore
        echo "<right><a href='delete.php?image='".$row['image']."'>X</a></right>";
        echo "<p><img id='image' src='".$row['image']."' style='width: 300px; height: 300px;'></td></div></p>";
        echo "</center>";
        $counter = 0;
      }
      else {
        echo "<center>";
        echo "<td>";
        echo "<div id='imagebox'> ";
        echo "<right><a href='delete.php?image='".$row['image']."'>X</a></right>";
        echo "<img id='image' src='".$row['image']."' style='width: 300px; height: 300px;'>";
        echo "</div>";
        echo "</td>";
        echo "</center>";
        $counter= $counter+1;
      }
    }
    echo "</center>";
    echo "</tr>";
    echo "</table>";
}


function getAllImages($conn, $username){
  $query = "SELECT image FROM images;";
  $query_run = mysqli_query($conn, $query);
  $counter = 0;
  echo "<link rel='stylesheet' href='main.css'>";
  echo "<table>";
  echo "<center>";
  echo "<tr>";
  while ($row = mysqli_fetch_array($query_run)) {
    if ($counter === 2) {
      echo "<center>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>";
      echo "<div id='imagebox'> ";
      echo "<img id='image' src='".$row['image']."' style='width: 300px; height: 300px;'>";
      echo "</div>";
      echo "</td>";
      echo "</center>";
      $counter = 0;
    }
    else {
    echo "<td>";
    echo "<div id='imagebox'> ";
    echo "<img id='image' src='".$row['image']."' style='width: 300px; height: 300px;'>";
    echo "</div>";
    echo "</td>";
    $counter= $counter+1;
    }
  }
  echo "</center>";
  echo "</tr>";
  echo "</table>";
}


 ?>
