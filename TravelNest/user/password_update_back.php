<?php
include 'dbconnect.php';
include 'authentication.php';
$currentUser=$_SESSION['email'];
$pass1=$_POST['newpass'];
$pass2=$_POST['newpass2'];

if($pass1==$pass2){
    $sql="UPDATE customer SET c_password = '$pass1' WHERE c_email='$currentUser'"; //updating password

    $result=mysqli_query($conn,$sql);
    header('Location:user_profile.php'); //redirecting to user_profile.php after updating password
    }
else if ($pass1!=$pass2) { //if password and confirm password does not match
    echo 'inavlid';
}

?>
