<?php
    include('connection.php');
    if (isset($_POST['submit'])) 
    {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from staff where staffID = '$username' and staffPassword = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1)
        {  
            session_start();
            $_SESSION['staffID']=$row['staffID'];
            header("Location: staffindex.php");
        }  
        else
        {  
            echo  '<script>
                        window.location.href = "stafflogin.php";
                        alert("Login failed. Invalid staff ID or password!!")
                    </script>';
        }     
    }
?>