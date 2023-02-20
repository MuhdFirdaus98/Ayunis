<?php
include "connection.php";

$productID = $_GET['productID'];

if(isset($_POST['submit']))
{
    $type = $_POST['type'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];
    $date = $_POST['date'];
    $supplier = $_POST['supplier'];
    $productID = $_POST['productID'];

    $sql = "UPDATE `product` SET `type`='$type',`productName`='$productName',
    `productPrice`='$productPrice',`productQuantity`='$productQuantity',`date`=' $date',`supplier`='$supplier' WHERE productID=$productID";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: viewproduct.php?msg=Data updated successfully");
    }
    else
    { 
        echo "Failed: ". mysqli_query($conn,$sql);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!--FONT AWESOME------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>EDIT PRODUCT</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        AYUNIS EDIT PRODUCT FORM
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Product</h3>
        
        </div>

        <?php
            $productID = $_GET['productID'];
            $sql = "SELECT * FROM `product` WHERE productID = $productID LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="editproduct.php" method="post" style="width:50vm; min-width:300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="productName" value = "<?php echo $row ['productName'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Product Type</label>
                        <input type="text" class="form-control" name="type" value = "<?php echo $row ['type'] ?>">
                    </div>
                </div>
    <br>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Product Id</label>
                        <input type="text" class="form-control" name="productID" value = "<?php echo $row ['productID'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="productQuantity" value = "<?php echo $row ['productQuantity'] ?>">
                    </div>
                </div>
    <br>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Price/Unit</label>
                        <input type="text" class="form-control" name="productPrice" value = "<?php echo $row ['productPrice'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" value = "<?php echo $row ['date'] ?>">
                    </div>
                </div>

                <div clss="mb-3">
                    <div class="col">
                        <label class="form-label">Supplier</label>
                        <input type="text" class="form-control" name="supplier" value = "<?php echo $row ['supplier'] ?>">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<body>
</html>