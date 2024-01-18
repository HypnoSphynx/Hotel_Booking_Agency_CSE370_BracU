<?php
require_once('dbconnect.php');

$user_email = $_SESSION['email'];

// sql query to find customer_id based on the email
$sql = ("SELECT c_id FROM Customer  WHERE c_email = '$user_email'");
$result = mysqli_query($conn, $sql);
if ($result) {

    $row = mysqli_fetch_assoc($result);
    $user_id = $row['c_id'];
}

// sql query to find paid information based on the customer_id
$sql2 = ("SELECT * FROM Payment WHERE c_id = $user_id");
$result = mysqli_query($conn, $sql2);
