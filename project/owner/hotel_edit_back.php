<!-- here the owner can edit a the hotel info -->
<?php


require_once('dbconnect.php');
include "authentication.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $h_id = $_POST['h_id'];
    $h_name = $_POST['h_name'];
    $h_number = $_POST['h_number'];
    $h_email = $_POST['h_email'];
    $h_location = $_POST['h_location'];
    $h_description = $_POST['h_description'];


    // Update the hotel data in the database



    $stmt = $conn->prepare("UPDATE Hotel SET h_name = ?, h_number = ?, h_email = ?, h_location = ?, h_description = ? WHERE h_id = ?");
    $stmt->bind_param("sisssi", $h_name, $h_number, $h_email, $h_location, $h_description, $h_id);
    $stmt->execute();
    header('Location: owner_dashboard_front.php');
    exit;
}

?>
<!--This code uses the ternary operator (? :) to check if $hotel is set. If it is, it uses the value from $hotel. If not, it uses an empty string.  -->