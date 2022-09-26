<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="main.css">
	<head>
	<body>
		<div id="box">
			<center style="font-size:32px;"><strong>log in<strong></center>
			<hr>
			<form action="login2.php" method="POST">
      <center>
			<br><strong>Username</strong></br>
			<input type="text" placeholder="Username" name="username" required>
			<br><strong>Password</strong></br>
			<input type="password" placeholder="Password" name="password" required>
			<p><button name="submit" type="submit">login</button>
			<button ><a href="register.php"> Sign up</a></button></p>
			<?php
			if (isset($_GET["error"])) {
					if ($_GET['error']=='nomatch') {
						echo "<br>Wrong username or password!</br>";
					}
			}
			 ?>
      </center>
		</form>
		</div>
	</body>
</html>
