<?php




include 'dbconnect.php';
include 'authentication.php';
$currentUser=$_SESSION['email'];

$pass1=$_POST['newpass'];

$pass2=$_POST['newpass2'];

if($pass1==$pass2){
    $sql="UPDATE customer SET c_password = $pass1 WHERE c_email='$currentUser'";

    $result=mysqli_query($conn,$sql);
    header('location: user_profile.php');

    // $stmt = $conn->prepare("UPDATE customer SET c_password = $pass1 WHERE c_email=$currentUser");

    // $stmt->execute();
    }
else if ($pass1!=$pass2) {
    echo 'inavlid';
}

?>
