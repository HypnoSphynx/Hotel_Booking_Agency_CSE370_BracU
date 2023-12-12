<?php

require_once('dbconnect.php');
$name = $_POST['ho_name'];
$phone = $_POST['ho_number'];
$email = $_POST['ho_email'];
$password = $_POST['ho_password'];
$gender = $_POST['ho_gender'];
$address = $_POST['ho_address'];

if(!empty($name) && !empty($phone) && !empty($email) && !empty($password) && !empty($gender) && !empty($address)){
  
    $stmt = $conn->prepare("INSERT INTO Hotel_Owner VALUES (NULL, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $phone, $email, $gender, $address, $password);
    $stmt->execute();
    echo 'signup succesfull';
    $stmt->close();
    $conn->close();
} else {
    echo "All fields are required";
    die();
}

?>