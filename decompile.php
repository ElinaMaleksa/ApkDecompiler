<?php
session_start();

if(isset($_SESSION["login_user"]) == "")
{
    header("location: index.php"); 
    exit;
}
require_once("./Decompiler/Info.php");
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
		<h2 id="regisText">Decompilation Report:</h2>
		<p> 
		<?php		 
		    $data = getApkFileInfo($_SESSION['myFile']);
            print_r($data);
            unlink($_SESSION['myFile']);
            $_SESSION['myFile'] = "";
        ?>
        
		</p>
	</div>
</body>
</html>
