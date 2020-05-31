<?php
#connection code ...
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false)
{
    die("Kļūdas Paziņojums: Neizdevās Izveidot Savienojumu ar DB!". mysqli_connect_error());
}
?>