<!-- for tracking which owner is currently logged in -->
<?php
//session handling
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: user_login_front.php");
    exit;
}
