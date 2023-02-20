<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];
    $date = $_POST['date'];
    $supplier = $_POST['supplier'];
    //var_dump($productID,$type,$productName,$productPrice,$productQuantity,$date,$supplier);
    $sql = "INSERT INTO `product`(`type`,`productName`,`productPrice`, `productQuantity`, `date`, `supplier`) 
    VALUES ('$type','$productName','$productPrice','$productQuantity','$date','$supplier')";

    $result = mysqli_query($conn, $sql);

    if ($result) 
    {   
        $to_month = array(
            "01" => "JAN",
            "02" => "FEB",
            "03" => "MAR",
            "04" => "APR",
            "05" => "MAY",
            "06" => "JUN",
            "07" => "JUL",
            "08" => "AUG",
            "09" => "SEP",
            "10" => "OCT",
            "11" => "NOV",
            "12" => "DEC"
          );
          $cost = $productQuantity * $productPrice;
          $month = explode("-", $date)[1];
          $col = null;
          foreach($to_month as $key => $value)
            {
                if ($key == $month) {
                $col = $value;
                break;  
                }
            }
          $year = explode("-", $date)[0];
          $sql = "INSERT INTO `cost`(`productName`,year, `$col`) VALUES ('$productName', '$year', '$cost');";
          mysqli_query($conn, $sql);
        $sql = "INSERT INTO `unit_sold` (`productName`, year) VALUES ('$productName', '$year')";
        mysqli_query($conn, $sql);
        /*
        $col = null;
        $month = $date;
        $year = explode("-",  $month)[0];
        foreach($to_month as $key => $value)
        {
            if ($key == explode("-", $month)[1]) {
            $col = $value;
            break;  
            }
        }
        /// UPDATE unit_sold SET JAN=3023 WHERE productName=?
        $sql = sprintf("UPDATE cost SET %s=(%s + %s) WHERE productName='%s' AND year=%s", ...[$col, $col, $productQuantity * $productPrice, $productName, $year]);
        $result = mysqli_query($conn, $sql);
        if(!$result) 
        {
            echo 'Cannot update unit cost';
        }*/
        header("Location: viewproduct.php?msg=New record created successfully");
    } else {
        echo "Failed: ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--BOOTSTRAP---------------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--FONT AWESOME------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>ADD NEW PRODUCT</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        AYUNIS NEW PRODUCT FORM
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Poduct</h3>
            <p class="text-muted">Please complete the form below to add new product</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="addproduct.php" method="post" style="width:50vm; min-width:300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="productName" placeholder="name" required="">
                    </div>

                    <div class="col">
                        <label class="form-label">Product Type</label>
                        <input type="text" class="form-control" name="type" placeholder="type" required="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="productQuantity" placeholder="0" required="">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Price/Unit</label>
                        <input type="text" class="form-control" name="productPrice" placeholder="RM" required="">
                    </div>

                    <div class="col">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" required="">
                    </div>
                </div>

                <div clss="mb-3">
                    <div class="col">
                        <label class="form-label">Supplier</label>
                        <!-- <input type="text" class="form-control" name="supplier" placeholder="supplier name" required=""> -->

                        <select class="custom-select" id="inputGroupSelect01" required name="supplier">

                            <?php
                            include "connection.php";

                            $sql = "SELECT * FROM `supplier`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['supplierID'] ?>"><?php echo $row['supplierName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success" name="submit">Done</button>
                    <a href="viewproduct.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <!--BOOTSTRAP---------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <body>

</html>