<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up as User</title>
    <link rel="stylesheet" href="css/user_signup_design.css">
</head>
<body>
    <!-- accessing global navbar -->
    <?php include '..\global_navbar.php' ?>

    <form action="user_signup_back.php" class="box" method="post">
        <h1>Sign Up as User</h1>
        <br>
        <hr>
        <input type="text" name="c_name" placeholder="Name">
        <input type="int" name="c_number" placeholder="Phone Number">
        <input type="text" name="c_email" placeholder="Email">
        <input type="text" name="c_gender" placeholder="Gender">
        <input type="password" name="c_password" placeholder="Password">
        <input type="submit" name="" value="Sign Up">
        <p class="message">Registered? <a href="user_login_front.php">Log in here</a></p>
    </form>

</body>
</html>