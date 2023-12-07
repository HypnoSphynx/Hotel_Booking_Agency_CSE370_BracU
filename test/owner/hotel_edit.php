<!-- here the owner can edit a the hotel info -->
<?php

//session handling
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: user_login_front.php");
    exit;
}

require_once('dbconnect.php');
if (isset($_GET['id'])) {
    $hotel_id = $_GET['id'];
    // getting current hotel id
}

if (isset($_GET['id'])) {
    $hotel_id = $_GET['id'];
    // Query the database to get the current hotel data
    $result = $conn->query("SELECT * FROM Hotel WHERE h_id = '$hotel_id'");
    $hotel = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated data from the form
    $h_name = $_POST['h_name'];
    $h_number = $_POST['h_number'];
    $h_email = $_POST['h_email'];
    $h_location = $_POST['h_location'];
    $h_description = $_POST['h_description'];

    // Update the hotel data in the database
    $sql = "UPDATE Hotel SET h_name = '$h_name', h_number = '$h_number', h_email = '$h_email', h_location = '$h_location', h_description = '$h_description' WHERE Hotel.h_id = '$hotel_id'";
    $conn->query($sql);
    header('Location: owner_dashboard.php');
    exit;
}

?>
<!--This code uses the ternary operator (? :) to check if $hotel is set. If it is, it uses the value from $hotel. If not, it uses an empty string.  -->


<form method="post">
    Name: <input type="text" name="h_name" value="<?php echo isset($hotel) ? $hotel['h_name'] : ''; ?>"><br>
    Number: <input type="text" name="h_number" value="<?php echo isset($hotel) ? $hotel['h_number'] : ''; ?>"><br>
    Email: <input type="text" name="h_email" value="<?php echo isset($hotel) ? $hotel['h_email'] : ''; ?>"><br>
    Location: <input type="text" name="h_location" value="<?php echo isset($hotel) ? $hotel['h_location'] : ''; ?>"><br>
    Description: <input type="text" name="h_description" value="<?php echo isset($hotel) ? $hotel['h_description'] : ''; ?>"><br>
    <input type="submit" value="Update">
</form>