<!-- login related backend work and sql query -->

<?php

require_once('dbconnect.php');
$email = $_POST['ho_email'];
$password = $_POST['ho_password'];
$login = False;

if (!empty($email) && !empty($password)) {

    $stmt = $conn->prepare("SELECT * FROM Hotel_Owner WHERE ho_email = ? AND ho_password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: owner_homepage.php");
    } else {
        echo 'Invalid email or password';
    }

    $stmt->close();
    $conn->close();
} else {
    echo "All fields are required";
    die();
}
