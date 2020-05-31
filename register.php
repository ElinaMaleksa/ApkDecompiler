<?php
require_once "db_config.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$error = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
   # $sql = #sql command ... ;
        
    if($stmt = mysqli_prepare($link, $sql))
	{
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = trim($_POST["username"]);

        if(mysqli_stmt_execute($stmt))
		{
            mysqli_stmt_store_result($stmt);
                
            if(mysqli_stmt_num_rows($stmt) == 1)
			{
                $error = "Username is taken!";
    	        echo "<script type='text/javascript'>alert('$error');</script>";
            } 
			else
			{
                $username = trim($_POST["username"]);
                $password = trim($_POST["password"]);
    
                # $sql = #sql command ... ;
                     
                if($stmt = mysqli_prepare($link, $sql))
            	{
                    mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
                        
                    $param_username = $username;
                    $param_password = password_hash($password, PASSWORD_DEFAULT);
                        
                    if(mysqli_stmt_execute($stmt))
            		{
            		     $error = "Registration successful! Please wait until admin will give you permisson to log in!";
                        echo "<script type='text/javascript'>alert('$error');</script>";
                    } 
            		else
            		{
                        $error = "Error. Please try again later.";
                        echo "<script type='text/javascript'>alert('$error');</script>";
                    }
                }
            }
        } 
		else
		{
            $error = "Error. Please try again later.";
            echo "<script type='text/javascript'>alert('$error');</script>";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="../Design/favicon.ico" type="image/ico">
	<link rel="stylesheet" type="text/css" href="../Design/style.css">
	
	<meta charset="utf-8">
	<title>Register</title>
</head>
 
<body class="login">
<br><br><br>
<form action="" method="post" id="forma">
<table align="center">
<p> <h2 align="center" class="whitetext">Registration</h2> <p>
<tr>

<tr>
<td class="whitetext">Username: </td>
<td><input type="text" name="username" placeholder="Enter username" id="username"></td>
</tr>
 
<tr>
<td class="whitetext">Password:</td>
<td><input type="password" name="password" placeholder="******" id="password"></td>
</tr>
<tr>

<tr>
<td class="whitetext">Confirm password:</td>
<td><input type="password" placeholder="******" id="password2"></td>
</tr>
<tr>


<tr>
<td></td>
<td><input type="submit" name="submit" value="Register" id="submit" onclick="myFunction()"></td>
</tr>


</table>
<tr>
<td></td>
</tr>
</table>
<p><a href="index.php" class="whitetext" align="center">Home</a></p>

</form>

<script>
var forma = document.getElementById('forma');
function validateForm(event) {

	var username = document.getElementById('username');
	var password = document.getElementById('password');
	var password2 = document.getElementById('password2');
	

	if(username.value === "") {
		alert("Enter username!");
		event.preventDefault();
	}
	else if(!(username.value.length > 4)) {
		alert("Username has to contain at least 5 symbols!");
		event.preventDefault();
	}
	else if(!(password.value.length > 7)) {
		alert("Password has to contain at least 8 symbols!");
		event.preventDefault();
	}	
	else if(!(password.value==password2.value)) {
		alert("Passwords do not match!");
		event.preventDefault();
	}
	forma.submit();
}
forma.addEventListener("submit", validateForm, false);
</script>

</body>
</html>