<?php

require_once('dbconnect.php');
$name = $_POST['c_name'];
$phone = $_POST['c_number'];
$email = $_POST['c_email'];
$password = $_POST['c_password'];
$gender = $_POST['c_gender'];

if(!empty($name) && !empty($phone) && !empty($email) && !empty($password) && !empty($gender)){
  
    $stmt = $conn->prepare("INSERT INTO Customer VALUES (NULL, ?, ?, ?, ?, ?, 'Silver', NULL, NULL)");
    $stmt->bind_param("sssss", $name, $phone, $email, $gender, $password);
    $stmt->execute();
    echo 'signup successful';
    $stmt->close();
    $conn->close();
} else {
    echo "All fields are required";
    die();
}   
?>