<?php
include "connection.php";
session_start();
$ownerID = $_SESSION['ownerID'];

if(isset($_POST['submit']))
{
    $ownerPassword = $_POST['ownerPassword'];
    $ownerName = $_POST['ownerName'];
    $ownerAddress = $_POST['ownerAddress'];
    $ownerPhone = $_POST['ownerPhone'];

    $sql = "UPDATE `owner_login` SET `ownerPassword`='$ownerPassword',`ownerName`= '$ownerName',`ownerAddress`='$ownerAddress', `ownerPhone`= '$ownerPhone' WHERE ownerID ='$ownerID'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: adminindex.php?msg=Data updated successfully");
    }
    else
    {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!--FONT AWESOME------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>OWNER INFORMATION</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        OWNER INFORMATION
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Owner Information</h3>
            <p class="text-muted">Please click update after changing any information</p>
        </div>

        <?php
        $sql = "SELECT * FROM `owner_login` WHERE `ownerID` = '$ownerID' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="viewadmin.php" method="post" style="width:50vm; min-width:300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Owner Name</label>
                        <input type="text" class="form-control" name="ownerName" value = "<?php echo $row ['ownerName'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Owner Address</label>
                        <input type="text" class="form-control" name="ownerAddress" value = "<?php echo $row ['ownerAddress'] ?>">
                    </div>
                </div>
    <br>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Owner Id</label>
                        <input type="text" class="form-control" name="ownerID" value = "<?php echo $row ['ownerID'] ?>">
                    </div>
    <br>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Owner Password</label>
                        <input type="password" class="form-control" name="ownerPassword" value = "<?php echo $row ['ownerPassword'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="ownerPhone" value = "<?php echo $row ['ownerPhone'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                        <button type="submit" class="btn btn-success" name="submit">Done</button>
                        <a href="adminindex.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <!--BOOTSTRAP---------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<body>
</html>