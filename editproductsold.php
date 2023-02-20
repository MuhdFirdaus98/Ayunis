<?php
include "connection.php";

$productsoldId = $_GET['productsoldId'];

if (isset($_POST['submit'])) {
    
    $productsoldId  = $_POST['productsoldId'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $month = $_POST['month'];
    
    $sql = "UPDATE `productsold` SET `product`='$product',
    `price`='$price',`quantity`='$quantity',`month`='$month' WHERE productsoldId=$productsoldId";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: viewproductsold.php?msg=New record created successfully");
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

    <title>ADD PRODUCT SOLD</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        AYUNIS PRODUCT SOLD
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Poduct Sold</h3>
            <p class="text-muted"></p>
        </div>

        <?php
            $productsoldId = $_GET['productsoldId'];
            $sql = "SELECT * FROM `productsold` WHERE productsoldId = $productsoldId LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="editproductsold.php" method="post" style="width:50vm; min-width:300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Product Sold Id</label>
                        <input type="text" class="form-control" name="productsoldId" value = "<?php echo $row ['productsoldId'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Price/Unit</label>
                        <input type="text" class="form-control" name="price" value = "<?php echo $row ['price'] ?>">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" value = "<?php echo $row ['quantity'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">End Date</label>
                        <input type="month" class="form-control" name="month" value = "<?php echo $row ['month'] ?>">
                        <!--<select id="month" name="month">
                            <option value="JANUARY">JANUARY</option>
                            <option value="FEBRUARY">FEBRUARY</option>
                            <option value="MARCH">MARCH</option>
                            <option value="APRIL">APRIL</option>
                            <option value="MAY">MAY</option>
                            <option value="JUN">JUN</option>
                            <option value="JULY">JULY</option>
                            <option value="AUGUST">AUGUST</option>
                            <option value="OCTOBER">OCTOBER</option>
                            <option value="NOVEMBER">NOVEMBER</option>
                            <option value="DECEMBER">DECEMBER</option>
                        </select>-->
                    </div>
                </div>

                <div clss="mb-3">
                    <div class="col">
                        <label class="form-label">Product Name</label>
                        <!-- <input type="text" class="form-control" name="supplier" placeholder="supplier name" required=""> -->

                        <select class="custom-select" id="inputGroupSelect01" required name="product">

                            <?php
                            include "connection.php";

                            $sql = "SELECT * FROM `product`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['productID'] ?>"><?php echo $row['productName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success" name="submit">Done</button>
                    <a href="viewproductsold.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <!--BOOTSTRAP---------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <body>

</html>