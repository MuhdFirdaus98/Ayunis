<?php
include "connection.php";
$salesID = $_GET['salesID'];
if(isset($_POST['submit']))
{
    $sales = $_POST['sales'];
    $date = $_POST['date'];
    
    $sql = "UPDATE `product_sales` SET `sales`='$sales',`date`='$date' WHERE salesID=$salesID";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: viewsales.php?msg=Data updated successfully");
    }
    else
    {
        echo "Failed: ". mysqli_query($conn, $sql);
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

    <title>SALES VIEW</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        AYUNIS SALES
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Sales</h3>
            <p class="text-muted">Please click update after changing any information</p>
        </div>

        <?php
        $salesID = $_GET['salesID'];
        $sql = "SELECT * FROM `product_sales` WHERE salesID = $salesID LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container">
                <div class="text-center mb-4">
                    <h3>Add Sales</h3>
                    <p class="text-muted">Please complete the form below to add sales</p>
                </div>

                <div class="container d-flex justify-content-center">
                    <form action="editsales.php?salesID=<?php echo $salesID; ?>" method="post" style="width:50vm; min-width:300px;">
                        <div class="row">

                            <div class="col">
                                <label class="form-label">Total Sales (RM)</label>
                                <input type="text" class="form-control" name="sales" value = "<?php echo $row ['sales'] ?>">
                            </div>

                            <div class="col">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" value = "<?php echo $row ['date'] ?>">
                            </div>
                        </div>
            <br>
                        <div class="mb-3">
                                <button type="submit" class="btn btn-success" name="submit">Done</button>
                                <a href="viewsales.php" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
        </div>

    </div>
    <!--BOOTSTRAP---------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<body>
</html>