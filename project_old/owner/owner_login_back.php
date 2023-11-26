<?php

require_once('dbconnect.php');
$email = $_POST['ho_email'];
$password = $_POST['ho_password'];


if(!empty($email) && !empty($password)){
  
    $stmt = $conn->prepare("SELECT * FROM Hotel_Owner WHERE ho_email = ? AND ho_password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        echo 'login successful';
    } else {
        echo 'Invalid email or password';
    }

    $stmt->close();
    $conn->close();
} else {
    echo "All fields are required";
    die();
}   
?>