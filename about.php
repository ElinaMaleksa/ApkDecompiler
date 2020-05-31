<?php
session_start();

if(isset($_SESSION["login_user"]) == "")
{
    header("location: index.php"); 
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../Design/favicon.ico" type="image/ico">
<link rel="stylesheet" type="text/css" href="../Design/style.css">
	<title>Info</title>
	<meta charset="utf-8">
</head>

<body align="left">
<div class="topnav">
		<a href="profile.php">Decompile APK</a>
		<a href="logout.php" style="float:right">Log out</a>
		<a href="about.php" style="float:right">About</a>
	</div>
	
	<div id="header">
		<h2 id="regisText">About</h2>
		<p> 
		The tool is designed to decompile and analyze Andorid Package Kit (APK) files to obtain an application report.
		<br><br><br>
		After successful apk file upload and decompilation following information can be obtained:<br><br>
- data about package (version, name, SDK minimal support Version, SDK target version etc.)<br>
- application permissions<br>
- hardware features that might be used and if they are required<br>
- information about apk file (size, name etc.)
		</p>
	</div>
</body>
</html>
