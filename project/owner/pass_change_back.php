<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

include 'dbconnect.php';
$currentUser=$_SESSION['email'];

$pass1=$_POST['newpass'];
$pass2=$_POST['newpass2'];

if($pass1==$pass2){
    $sql="UPDATE hotel_owner SET ho_password = '$pass1' WHERE ho_email='$currentUser'";
    $result=mysqli_query($conn,$sql);
    header("location: owner_profile.php");
    }
else if ($pass1!=$pass2) {
    echo 'inavlid';
}

?>
