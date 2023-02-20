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

    <title>TOTAL SALES</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        AYUNIS TOTAL SALES
    </nav>
<!--------Calculate product sold to customer------>
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

        <a href = "staffindex.html" class ="btn btn-dark mb-3">HOME</a>

        <table class ="table table-hover text-center">
            <thead class ="table-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Year</th>
                <th scope="col">JAN</th>
                <th scope="col">FEB</th>
                <th scope="col">MAR</th>
                <th scope="col">APR</th>
                <th scope="col">MAY</t>
                <th scope="col">JUN</th>
                <th scope="col">JUL</t>
                <th scope="col">AUG</th>
                <th scope="col">SEP</t>
                <th scope="col">OCT</th>
                <th scope="col">NOV</t>
                <th scope="col">DEC</t>
                <th scope="col">TOTAL</t>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";

                    $sql = "SELECT * FROM `unit_sold`";
                    $result = mysqli_query($conn, $sql);
                    while( $row = mysqli_fetch_assoc($result))
                    {
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['productName'] ?></td>
                                <td><?php echo $row['Year'] ?></td>
                                <td><?php echo $row['JAN'] ?></td>
                                <td><?php echo $row['FEB'] ?></td>
                                <td><?php echo $row['MAR'] ?></td>
                                <td><?php echo $row['APR'] ?></td>
                                <td><?php echo $row['MAY'] ?></td>
                                <td><?php echo $row['JUN'] ?></td>
                                <td><?php echo $row['JUL'] ?></td>
                                <td><?php echo $row['AUG'] ?></td>
                                <td><?php echo $row['SEP'] ?></td>
                                <td><?php echo $row['OCT'] ?></td>
                                <td><?php echo $row['NOV'] ?></td>
                                <td><?php echo $row['DEC'] ?></td>
                                
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
<!----Calculate product buy from supplier---->
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

        <table class ="table table-hover text-center">
            <thead class ="table-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Total Cost (RM)</th>
                <th scope="col">Month</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";

                    $sql = "SELECT productID, productName, productPrice * productQuantity as totalCost, date FROM `product`";
                    $result = mysqli_query($conn, $sql);
                    while( $row = mysqli_fetch_assoc($result))
                    {
                        ?>
                            <tr>
                                <td><?php echo $row['productID'] ?></td>
                                <td><?php echo $row['productName'] ?></td>
                                <td><?php echo $row['totalCost'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!----Calculate total sales---->

    <!--BOOTSTRAP---------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<body>
</html>