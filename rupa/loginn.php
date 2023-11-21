<?php


    if(isset($_POST['submit'])){
        //check email
        echo $_POST['email'];
        if(empty($_POST['email'])){
            echo 'your email is required';
        }
        //check password
        if(empty($_POST['password'])){
            echo 'Your password is needed';
        }
        if(isset($_POST['email']) && isset($_POST['password'])) {
            $e = $_POST['email'];
            $p = $_POST['password'];
            $sql = "SELECT * FROM user WHERE username='$e' AND password='$p'";
    
              //make query and get result
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result)>0) {
                header("Location: home.php"); 
            exit();
            }
        
        } else{
            echo 'Your Email or password is invalid';
        }
    }
?>