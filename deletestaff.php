<?php

include "connection.php";
$staffID = $_GET['staffID'];
$sql = "DELETE FROM `staff` WHERE staffID = $staffID";
$result = mysqli_query($conn, $sql);
if($result)
{
    header("Location: index.php?msg=Record delete successfully");
}
else
{
    echo "Failed: " . mysqli_query($conn);
}
?>