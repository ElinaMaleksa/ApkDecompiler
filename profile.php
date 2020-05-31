<?php
session_start();

if(isset($_SESSION["login_user"]) == "")
{
    header("location: index.php"); 
    exit;
}
?>

<html>
<head>
	<link rel="icon" href="../Design/favicon.ico" type="image/ico">
	<link rel="stylesheet" type="text/css" href="../Design/style.css">
	<title>Profile</title>
</head>    

<body>
    
    <div class="topnav">
		<a href="profile.php">Decompile APK</a>
		<a href="logout.php" style="float:right">Log out</a>
		<a href="about.php" style="float:right">About</a>
	</div>
	
	<div id="header" align="center">
		<h2>Welcome to APK decompiler</h2>
		<br>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload">
        <br>
	</div>
    </form>
    
</body>
</html>