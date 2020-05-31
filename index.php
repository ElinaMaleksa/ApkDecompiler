<?php
include('login.php');

if(isset($_SESSION['login_user'])&& $_SESSION['login_user'] == true){
	print "<script language=\"Javascript\">document.location.href='profile.php' ;</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../Design/favicon.ico" type="image/ico">
	<link rel="stylesheet" type="text/css" href="../Design/style.css">
	<title>Login</title>
</head>

<body align="center">
	<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>App<span><b>ReEn</b></span></div>
		</div>
		<br>
		<form action="" method="post">
		<div class="login">
				<input id="name" name="username" placeholder="username" type="text"><br>
				<input id="password" name="password" placeholder="**********" type="password"><br>
				<input name="submit" type="submit" value="Login">
				<br><br>
				<a href="register.php" class="whitetext">Register</a>
		</div>
		</form>
</body>
</html>