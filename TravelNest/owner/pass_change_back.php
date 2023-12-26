<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

//same as user pass change
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
