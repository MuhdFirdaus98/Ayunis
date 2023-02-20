<?php 

$host = "localhost";
$username = "root";
$password = "";
$db_name = "ayunis";

$conn = mysqli_connect($host, $username, $password, $db_name);

if(!$conn) 
{
    die("Cannot connect to the database");
}

?>
