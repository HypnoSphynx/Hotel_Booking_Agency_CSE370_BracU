<?php 

include 'connection.php';

    $address = $_POST['address'];
    $phone = $_POST['phn'];
    $id = $_POST['studnt_id'];

    $sql = "UPDATE `student` SET `address` = '$address', `phone` = '$phone' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header('location: studentprofile.php');
    
?>