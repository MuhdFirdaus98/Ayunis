<?php
session_start();

if(isset($_SESSION['ownerID'])) 
{
    session_destroy();
    echo "<script>location.replace('adminlogin.php')</script>";
} 
else 
{
    //echo "can not log out";
    // echo "<script>location.replace('adminlogin.php')</script>";
}
?>