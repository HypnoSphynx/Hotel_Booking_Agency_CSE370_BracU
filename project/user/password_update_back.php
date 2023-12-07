<?php




include 'dbconnect.php';
include 'authentication.php';
$currentUser=$_SESSION['email'];
echo $currentUser;
$pass1=$_POST['newpass'];
echo ($pass1);
$pass2=$_POST['newpass2'];
echo ($pass2);
if($pass1==$pass2){
    $sql="UPDATE customer SET c_password = $pass1 WHERE c_email='$currentUser'";

    $result=mysqli_query($conn,$sql);

    // $stmt = $conn->prepare("UPDATE customer SET c_password = $pass1 WHERE c_email=$currentUser");

    // $stmt->execute();
    }
else if ($pass1!=$pass2) {
    echo 'inavlid';
}

?>
