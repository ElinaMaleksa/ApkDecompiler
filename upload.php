<?php
session_start();

if(isset($_SESSION["login_user"]) == "")
{
    header("location: index.php"); 
    exit;
}

#directory code ...

if($imageFileType != "apk")
{
    echo "<script> alert('Sorry, only APK files are allowed.');
    window.location.href='profile.php'; </script>";
}
else
{
    if ($_FILES["fileToUpload"]["size"] > 1024 * 1024 * 50) // 50 MB
    {
        echo "<script> alert('Sorry, your file is too large.');
        window.location.href='profile.php'; </script>";
    }
    else
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
        {
            $_SESSION['myFile'] = $target_file;
            
            echo "<script> alert('File ". basename( $_FILES["fileToUpload"]["name"]). " has been successfully uploaded.');
            window.location.href='decompile.php'; </script>";
        } 
        else 
        {
            echo "<script> alert('Sorry, there was an error uploading your file.');
            window.location.href='profile.php'; </script>";
        }
    }
}
?>