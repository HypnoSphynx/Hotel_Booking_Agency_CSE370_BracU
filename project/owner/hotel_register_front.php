<!-- That is what a owner will see during registration -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Register Your Hotel</title>
    <link rel="stylesheet" href="css/owner_register_design.css">
</head>

<body>

    <form action="hotel_register_back.php" class="box" method="post" enctype="multipart/form-data">

        <h1>Registration</h1>
        <br>
        <hr>
        <input type="text" name="h_name" placeholder="Hotel Name">
        <input type="text" name="h_number" placeholder="Number">
        <input type="text" name="h_email" placeholder="Email">
        <input type="text" name="h_location" placeholder="Location">
        <input type="text" name="h_description" placeholder="Hotel Description">
        <input type="file" name="h_image">

        <input type="submit" name="" value="Register">
    </form>

</body>

</html>