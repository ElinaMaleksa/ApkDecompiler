<?php
session_start();
require_once "db_config.php";


$error=''; 
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) 
	{
		$error = "Login failed for some reason. Most likely your username or password was entered incorrectly.";
	}
	else 
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		 # $sql = #sql command ... ;
        
        if($stmt = mysqli_prepare($link, $sql))
		{
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt))
			{
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
				{                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
					
                    if(mysqli_stmt_fetch($stmt))
					{
                        if(password_verify($password, $hashed_password))
						{
						    session_start();
                           
                            $_SESSION['login_user']=$username; 
                            $_SESSION['myFile']=""; 
							header("location: profile.php"); 	                         
                        } 
						else
						{
                            $error = "Login failed for some reason. Most likely your username or password was entered incorrectly or your profile is not activated by admins.";
							echo "<script type='text/javascript'>alert('$error');</script>";
                        }
                    }
                } 
				else
				{
                    $error = "Login failed for some reason. Most likely your username or password was entered incorrectly or your profile is not activated by admins.";
					echo "<script type='text/javascript'>alert('$error');</script>";
                }
            } 
			else
			{
                $error = "Error. Try Again Later";
				echo "<script type='text/javascript'>alert('$error');</script>";
            }
        }
	mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>