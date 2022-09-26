<?php
$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "capstoneproject";

session_start();

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

//checks for error through connection
if (!$conn)
  die("Connection unsuccessful: " . mysqli_connect_error());


if( ! defined('SITE_URL') )
	define('SITE_URL', 'http://digigall.net');

if( ! defined('SITE_DIR') )
	define('SITE_DIR', __DIR__);


?>
