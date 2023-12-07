<?php
include 'authentication.php';
include 'dbconnect.php';
$currentUser=$_SESSION['email'];

$sql="SELECT * FROM customer WHERE c_email='$currentUser'";
$result=mysqli_query($conn,$sql);
if($result){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
        $name=$row['c_name'];
        $email=$row['c_email'];
        $number=$row['c_number'];
        $gender=$row['c_gender'];
        $class=$row['c_class'];         
        }
    }
}
?>