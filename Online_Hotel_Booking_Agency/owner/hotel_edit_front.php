

<?php
include "authentication.php";
$h_id = $_GET['h_id'];
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Information of Your Hotel</title>
    <link rel="stylesheet" href="css/owner_signup_design.css">
</head>
<body>
<?php include "owner_navbar.php"?>

<form action="hotel_edit_back.php" class="box" method="post">
    <h3>Change Information of Your Hotel</h3>
    <br>
    <hr>
    <input type="text" name="h_name" placeholder="Name" value="<?php echo isset($hotel) ? $hotel['h_name'] : ''; ?>">
    <input type="int" name="h_number" placeholder="Number"value="<?php echo isset($hotel) ? $hotel['h_email'] : ''; ?>">
    <input type="text" name="h_email" placeholder="Email" value="<?php echo isset($hotel) ? $hotel['h_location'] : ''; ?>">
    <input type="text" name="h_location" placeholder="Address" value="<?php echo isset($hotel) ? $hotel['h_location'] : ''; ?>">
    <input type="text" name="h_description" placeholder="Description" value="<?php echo isset($hotel) ? $hotel['h_description'] : ''; ?>">

    <!-- Add this input field to send the h_id value to the server -->
    <input type="hidden" name="h_id" value="<?php echo $h_id; ?>">

    <input type="submit" name="" value="Update">
</form>

</body>
</html>



<!-- <form method="post">
    Name: <input type="text" name="h_name" value=<br>
    Number: <input type="text" name="h_number" value="<?php echo isset($hotel) ? $hotel['h_number'] : ''; ?>"><br>
    Email: <input type="text" name="h_email" value="<?php echo isset($hotel) ? $hotel['h_email'] : ''; ?>"><br>
    Location: <input type="text" name="h_location" value="<?php echo isset($hotel) ? $hotel['h_location'] : ''; ?>"><br>
    Description: <input type="text" name="h_description" value="<?php echo isset($hotel) ? $hotel['h_description'] : ''; ?>"><br>
    <input type="submit" value=>
</form> -->