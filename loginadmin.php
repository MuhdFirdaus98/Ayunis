<?php
    include('connection.php');
    if (isset($_POST['submit'])) 
    {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from owner_login where ownerID = '$username' and ownerPassword = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        if($count == 1)
        { 
            session_start();
            $_SESSION['ownerID']= $row['ownerID'];
            header("Location: adminindex.php");
        }  
        else
        {  
            echo  '<script>
                        window.location.href = "adminlogin.php";
                        alert("Login failed. Invalid staff ID or password!!")
                    </script>';
        }     
    }
?>
   