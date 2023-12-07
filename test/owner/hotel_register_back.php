<!-- Hotel Registration Query Handeling -->


<?php
//session handling
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: user_login_front.php");
    exit;
}

require_once('dbconnect.php');

// Get the user ID from the session
$owner_email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT ho_id FROM Hotel_Owner WHERE ho_email = ?");
$stmt->bind_param("s", $owner_email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$owner_id = $row['ho_id'];


//Actual Login Code
$name = $_POST['h_name'];
$phone = $_POST['h_number'];
$email = $_POST['h_email'];
$location = $_POST['h_location'];
$description = $_POST['h_description'];

// Handle the image upload
$image = $_FILES['h_image']['name'];
$target_dir = "hotel_pic/";
$target_file = $target_dir . basename($image);


// Checking img and mvoing it to uploads folder
if (!empty($image) && move_uploaded_file($_FILES['h_image']['tmp_name'], $target_file)) {
    if (!empty($name) && !empty($phone) && !empty($email) && !empty($location) && !empty($description)) {

        // Insert the hotel into the database
        $stmt = $conn->prepare("INSERT INTO Hotel VALUES (NULL, ?, ?, ?, ?, ?, NULL, NULL, ?)");
        $stmt->bind_param("ssssss", $name, $phone, $email, $location, $description, $owner_id);

        if ($stmt->execute()) {
            // Get the hotel ID from the last insert AND insert the image
            $last_id = $conn->insert_id;
            $stmt = $conn->prepare("INSERT INTO Hotel_image_archive VALUES (?, ?)");
            $stmt->bind_param("ss", $last_id, $image);
            $stmt->execute();
            // echo 'signup successful';
            header('Location: owner_dashboard.php');
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
