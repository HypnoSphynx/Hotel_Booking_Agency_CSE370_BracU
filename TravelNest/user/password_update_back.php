<?php
include 'dbconnect.php';
include 'authentication.php';
$currentUser=$_SESSION['email'];
$pass1=$_POST['newpass'];
$pass2=$_POST['newpass2'];

if($pass1==$pass2){
    $sql="UPDATE customer SET c_password = '$pass1' WHERE c_email='$currentUser'";

    $result=mysqli_query($conn,$sql);


    header('Location:user_profile.php');

    }
else if ($pass1!=$pass2) {
    echo 'inavlid';
}

?>
