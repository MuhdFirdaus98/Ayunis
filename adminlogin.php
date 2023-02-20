<?php
    include("connection.php");
?>
    
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="ownerstyle.css">
    </head>
    <body>
        
        <div id="form">
            <h1>Login Form</h1>
            <form name="form" action="loginadmin.php" onsubmit="return isvalid()" method="POST">
                <label>Owner Id      : </label>
                <input type="text" id="user" name="user"></br></br>
                <label>Password: </label>
                <input type="password" id="pass" name="pass"></br></br>
                <input type="submit" id="btn" value="Login" name = "submit"/>
            </form>
        </div>
        <script>
            function isvalid()
            {
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length=="")
                {
                    alert(" Owner Id and password field is empty!!!");
                    return false;
                }
                else if(user.length=="")
                {
                    alert(" Owner Id field is empty!!!");
                    return false;
                }
                else if(pass.length=="")
                {
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
        </script>
    </body>
</html>