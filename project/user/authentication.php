<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: user_login_front.php");
    exit;
}
?>
<?php 
