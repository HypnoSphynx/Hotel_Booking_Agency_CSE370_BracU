<?php

require_once('dbconnect.php');
$email = $_POST['c_email'];
$password = $_POST['c_password'];

if(!empty($email) && !empty($password)){
  
    $stmt = $conn->prepare("SELECT * FROM Customer WHERE c_email = ? AND c_password = ?");
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