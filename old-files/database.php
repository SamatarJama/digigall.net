<?php
$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "AKmshxZmn2I0";
$dBName = "capstoneproject";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

//checks for error through connection
if (!$conn)
  die("Connection unsuccessful: " . mysqli_connect_error())
?>


