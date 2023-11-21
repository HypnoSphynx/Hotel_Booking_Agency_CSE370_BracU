<?php
    include 'connection.php';
    session_start();


    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM student WHERE email='$email'" ;


    //make query and get result
   $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

   

   if(mysqli_num_rows($result)>0) {
      $sql1 = "SELECT * FROM student WHERE email='$email'"; 
      $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
      $row1 = mysqli_fetch_assoc($result1);
      $storedPassword = $row1['password'];
     
      $flag = false;
      if($storedPassword==md5($password)){
        $flag = true;
      }
    

      if($flag){
        $_SESSION['user_id'] = $row1['id'];
       $_SESSION['user'] = $email;
        header("Location: home.php"); 
        exit();
      }else{
        header("Location: index.php");
        exit();
      }
   
    }
  
?>