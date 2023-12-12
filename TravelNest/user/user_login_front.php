<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login as User</title>
    <link rel="stylesheet" href="css/user_login_design.css">
</head>
<body>
    <?php include '..\global_navbar.php' ?>
    <form action="user_login_back.php" class="box" method="post">
        <h1>Login as User</h1>
        <br>
        <hr>
        <input type="text" name="c_email" id="c_email" placeholder="Email">
        <input type="password" name="c_password" id="c_password" placeholder="Password">
        <input type="submit" name="" value="Login">
        <p class="message">Not registered? <a href="user_signup_front.php">Create an account</a></p>
    </form>

</body>
</html>
