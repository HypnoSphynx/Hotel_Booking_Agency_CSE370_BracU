 
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="loginpage.css">
    </head>

    <body class="body-class">

    <div class="login-box">
        <div class="login-box-content">
            <form class="" action="authentication.php" method="POST">

                Your Email: <input type="email" name="email" placeholder="Email"><br>
                Password:   <input type="password" name="password" placeholder="Password"><br>

                <div >
                    <input type="submit" name="submit" class="login-button">
                </div>

            </form>

            <div class="signup">
                Don't have an account yet?
                <a href="signup.html">
                    Create an account
                </a>
            </div>
        </div>
    </div>
    </body>
</html>


<?php
header('loginn.php');
exit();    
?>
