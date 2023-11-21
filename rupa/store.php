<?php
  include 'connection.php';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST["pass2"];
  $id = $_POST['id'];
  $cgpa = $_POST['cgpa'];
  $phn = $_POST['phn'];

  if($pass1===$pass2){
    $pass1 = md5($pass1);
    $sql = "INSERT INTO `student` (`name`, `email`, `password`, `st_id`, `cgpa`, `phone`,`role`) VALUES ('$name', '$email', '$pass1', '$id', '$cgpa', '$phn', 'student');";
    $result = mysqli_query($conn, $sql) or die("Error invalid input");
  } else{
    echo "<span> password doesn't match</span>";
  }

  header("Location: index.php");
?>