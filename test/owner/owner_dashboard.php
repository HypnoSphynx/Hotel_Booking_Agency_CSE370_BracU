<!-- here he will see all the hotel info under him-->
<?php

//session handling
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: user_login_front.php");
    exit;
}

require_once('dbconnect.php');

// Get the user ID from the session
$owner_email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT ho_id FROM Hotel_Owner WHERE ho_email = ?");
$stmt->bind_param("s", $owner_email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$owner_id = $row['ho_id'];

// Get the hotel info from the database
$stmt = $conn->prepare("SELECT * FROM Hotel WHERE ho_id = ?");
$stmt->bind_param("s", $owner_id);
$stmt->execute();
$result = $stmt->get_result();

// Display the hotel info
echo '<ul>';
while ($row = $result->fetch_assoc()) {
    echo '<li>';
    echo '<div class="hotel-info-box">';
    echo 'Hotel ID: ' . $row['h_id'] . '<br>';
    echo 'Hotel Name: ' . $row['h_name'] . '<br>';
    echo 'Location: ' . $row['h_location'] . '<br>';
    echo 'Rating: ' . $row['h_rating'] . '<br>';
    echo 'Incentive: ' . $row['h_incentive'] . '<br>';
    echo '<button onclick="window.location.href=\'hotel_edit.php?id=' . $row['h_id'] . '\'">Edit</button>';
    echo '</div>';
    echo '</li>';
}
echo '</ul>';
?>