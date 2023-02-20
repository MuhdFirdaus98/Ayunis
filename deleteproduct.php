<?php

include "connection.php";
$productID = $_GET['productID'];
$sql = "DELETE FROM `product` WHERE productID = $productID";
$result = mysqli_query($conn, $sql);
if($result)
{
    header("Location: viewproduct.php?msg=Record delete successfully");
}
else
{
    echo "Failed: " . mysqli_query($conn);
}
?>