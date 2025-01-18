<?php
$server= "localhost";
$username= "root";
$pass = "";
$database = "e_passport";
$conn = mysqli_connect($server, $username, $pass, $database);
if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());    
}
?>