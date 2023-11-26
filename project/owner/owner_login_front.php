<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login as User</title>
    <link rel="stylesheet" href="owner_login_design.css">
</head>
<body>

    <form action="owner_login_back.php" class="box" method="post">
        <h1>Login as Hotel Owner</h1>
        <br>
        <hr>
        <input type="text" name="ho_email" placeholder="Email">
        <input type="password" name="ho_password" placeholder="Password">
        <input type="submit" name="" value="Login">
        <p class="message">Not registered? <a href="owner_signup_front.php">Create an account</a></p>
    </form>

</body>
</html>
