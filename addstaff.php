<?php
include "connection.php";

if(isset($_POST['submit']))
{
    $staffID = $_POST['staffID'];
    $staffPassword = $_POST['staffPassword'];
    $staffName = $_POST['staffName'];
    $staffPhone = $_POST['staffPhone'];
    $gender = $_POST['gender'];
    $staffAddress = $_POST['staffAddress'];
    $job = $_POST['job'];

    $sql = "INSERT INTO `staff`(`staffID`, `staffPassword`, `staffName`, `staffPhone`, `gender`, `staffAddress`, `job`) 
    VALUES ('$staffID','$staffPassword','$staffName','$staffPhone','$gender','$staffAddress','$job')";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: index.php?msg=New record created successfully");
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

    <title>ADD NEW STAFF</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        AYUNIS NEW STAFF FORM
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Staff</h3>
            <p class="text-muted">Please complete the form below to add new staff</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="addstaff.php" method="post" style="width:50vm; min-width:300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Staff Name</label>
                        <input type="text" class="form-control" name="staffName" placeholder="name" required ="">
                    </div>

                    <div class="col">
                        <label class="form-label">Staff Address</label>
                        <input type="text" class="form-control" name="staffAddress" placeholder="address" required ="">
                    </div>
                </div>
    <br>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Staff Id</label>
                        <input type="text" class="form-control" name="staffID" placeholder="id" required ="">
                    </div>

                    <div class="col">
                        <label class="form-label">Job</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" required name="job">
                                <option selected disabled></option>
                                <option value="cashier" >cashier</option>
                                <option value="warehouse">warehouse</option>
                                <option value="sales">sales</option>
                            </select>
                        </div>
                        <!--<input type="text" class="form-control" name="job" placeholder="job" required ="">-->
                    </div>
                </div>
    <br>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="staffPassword" placeholder="new password" required ="">
                    </div>

                    <div class="col">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="staffPhone" placeholder="without '-'" required ="">
                    </div>
                </div>

                <div clss="mb-3">
                    <div classe="form-group mb-3">
                            <label>Gender: </label> &nbsp;
                            <input type="radio" class="form-check-input" name="gender" id="male" value="male" required ="">
                            <label for="male" class="form-input-label">Male</label>
                            &nbsp;
                            <input type="radio" class="form-check-input" name="gender" id="female" value="female" required ="">
                            <label for="female" class="form-input-label">Female</label>
                    </div>
                </div>
                <br>
                <div class="mb-3">
                        <button type="submit" class="btn btn-success" name="submit">Done</button>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    
    <!--BOOTSTRAP---------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<body>
</html>