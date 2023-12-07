<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up as Owner</title>
    <link rel="stylesheet" href="css/owner_signup_design.css">
</head>
<body>
    <?php include '..\global_navbar.php' ?>
    <form action="owner_signup_back.php" class="box" method="post">

        <h1>Sign Up as Ownerr</h1>
        <br>
        <hr>
        <input type="text" name="ho_name" placeholder="Name">
        <input type="int" name="ho_number" placeholder="Phone Number">
        <input type="text" name="ho_email" placeholder="Email">
        <input type="text" name="ho_address" placeholder="Address">
        <input type="text" name="ho_gender" placeholder="Gender">
        <input type="password" name="ho_password" placeholder="Password">
        <input type="submit" name="" value="Sign Up">
        <p class="message">Registered? <a href="owner_login_front.php">Log in here</a></p>
    </form>

</body>
</html>
