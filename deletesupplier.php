<?php

include "connection.php";
$supplierID = $_GET['supplierID'];
$sql = "DELETE FROM `supplier` WHERE supplierID = $supplierID";
$result = mysqli_query($conn, $sql);
if($result)
{
    header("Location: viewsupplier.php?msg=Record delete successfully");
}
else
{
    echo "Failed: " . mysqli_query($conn);
}
?>