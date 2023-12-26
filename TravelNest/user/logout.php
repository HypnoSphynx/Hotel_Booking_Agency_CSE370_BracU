<!-- ending session when customer pressing logout button -->
<?php
session_start();
session_unset();
session_destroy();
header("Location: user_login_front.php");

?>