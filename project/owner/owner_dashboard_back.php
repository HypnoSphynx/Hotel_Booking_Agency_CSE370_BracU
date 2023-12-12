<!-- here he will see all the hotel info under him-->
<?php

// include 'authentication.php';
require_once('dbconnect.php');

// Get the user ID from the session
$owner_email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT ho_id FROM Hotel_Owner WHERE ho_email = ?");
$stmt->bind_param("s", $owner_email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$owner_id = $row['ho_id'];

$stmt = $conn->prepare("SELECT SUM(p_amount) FROM Payment WHERE ho_id = ?");
$stmt->bind_param("i", $owner_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$total_amount = $row['SUM(p_amount)'];


// Get the hotel info from the database
$stmt = $conn->prepare("SELECT * FROM Hotel WHERE ho_id = ?");
$stmt->bind_param("s", $owner_id);
$stmt->execute();
$result = $stmt->get_result();

?>