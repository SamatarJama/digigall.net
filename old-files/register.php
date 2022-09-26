<html>
	<head>
		<link rel="stylesheet" type="text/css" href="main.css">
	<head>
	<body>
		<div id="box">
			<center style="font-size:32px;"><strong>Register<strong></center>
			<form action="register2.php" method="POST">
      <center>
			<br><strong>Full name</strong></br>
			<input type="text" placeholder="Fullname" name="fullname" required>

      <br><strong>Email</strong></br>
			<input type="email" placeholder="Email" name="email" required>

			<br><strong>Username</strong></br>
			<input type="text" placeholder="Username" name="username" required>

			<br><strong>Password</strong></br>
			<input type="password" placeholder="Password" name="password" required>

      <br><strong>Retype password</strong></br>
			<input type="password" placeholder="Password" name="password2" required>

      <p>
			<button type="submit" name="submit"> Sign up</button>
      </p>
		</form>
		<?php
			if (isset($_GET["error"])) {
					if ($_GET['error']=='dataexist') {
						echo "<br>Username or email have been used before!</br>";
					}
					elseif ($_GET['error'] =='dissimilarpassword') {
						echo "<br>Passwords don't match!</br>";
					}
			}
		 ?>
		 </center>
		</div>
	</body>
</html>
