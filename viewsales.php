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

    <title>SALES</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        AYUNIS SALES
    </nav>

    <div class="container">
        <?php
        if(isset($_GET['msg']))
        {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>

        <a href = "staffindex.php" class ="btn btn-dark mb-3">HOME</a>
        <a href = "calSales.php" class ="btn btn-dark mb-3">Add New</a>

        <table class ="table table-hover text-center">
            <thead class ="table-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Sales (RM)</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "connection.php";

                    $sql = "SELECT * FROM `product_sales`";
                    $result = mysqli_query($conn, $sql);
                    while( $row = mysqli_fetch_assoc($result))
                    {
                        ?>
                            <tr>
                                <td><?php echo $row['salesID'] ?></td>
                                <td><?php echo $row['sales'] ?></td>
                                <td><?php echo $row['date'] ?></td> 
                                <td>
                                    <a href = "editsales.php?salesID=<?php echo $row['salesID']?>" class ="link-dark"><i class ="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                </td>                     
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!--BOOTSTRAP---------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<body>
</html>