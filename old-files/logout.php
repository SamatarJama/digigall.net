<?php
//ends the session and goes back to the login
session_start();
session_unset();
session_destroy();
header("location: login.php");
exit();
?>
