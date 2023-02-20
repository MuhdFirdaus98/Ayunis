<?php
include "connection.php";
$supplierID = $_GET['supplierID'];

if(isset($_POST['submit']))
{
    $supplierName = $_POST['supplierName'];
    $supplierPhone = $_POST['supplierPhone'];
    $ProductName = $_POST['ProductName'];
    $supplierAddress = $_POST['supplierAddress'];
    $supplierID = $_POST['supplierID'];

    $sql = "UPDATE `supplier` SET `supplierName`='$supplierName',`supplierPhone`='$supplierPhone',
    `ProductName`=' $ProductName',`supplierAddress`='$supplierAddress' WHERE supplierID=$supplierID";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: viewsupplier.php?msg=Data updated successfully");
    }
    else
    {
        echo "Failed: ".mysqli_query($conn, $sql);
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

    <title>ADD NEW SUPPLIER</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        AYUNIS NEW SUPPLIER FORM
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Supplier</h3>
            <p class="text-muted">Please click update after changing any information</p>
        </div>

        <?php
        $supplierID = $_GET['supplierID'];
        $sql = "SELECT * FROM `supplier` WHERE supplierID = $supplierID LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="editsupplier.php" method="post" style="width:50vm; min-width:300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Supplier ID</label>
                        <input type="text" class="form-control" name="supplierID" value = "<?php echo $row ['supplierID'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Supplier Name</label>
                        <input type="text" class="form-control" name="supplierName" value = "<?php echo $row ['supplierName'] ?>">
                    </div>
                </div>
    <br>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Phone No</label>
                        <input type="text" class="form-control" name="supplierPhone" value = "<?php echo $row ['supplierPhone'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="ProductName" value = "<?php echo $row ['ProductName'] ?>">
                    </div>
                </div>
    <br>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="supplierAddress" value = "<?php echo $row ['supplierAddress'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                        <button supplierName="submit" class="btn btn-success" name="submit">Done</button>
                        <a href="viewsupplier.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <!--BOOTSTRAP---------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<body>
</html>