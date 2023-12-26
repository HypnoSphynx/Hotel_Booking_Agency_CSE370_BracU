<!-- here it will get order info -->

<?php include 'authentication.php' ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/user_profile.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>User Profile</title>
</head>

<body>
    <?php include 'user_navbar.php' ?>

    <?php
    require_once('dbconnect.php');

    // Getting the current user's id from the session using the email
    $currentUser = $_SESSION['email'];
    $sql = "SELECT c_id FROM Customer WHERE c_email='$currentUser'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $c_id = $row['c_id'];

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the from and to dates
        $from = $_POST['from'];
        $to = $_POST['to'];
        $total_price = 0;
        // Loop through each room type
        foreach ($_POST['quantity'] as $room_type => $quantity) {
            if ($quantity != 0) {
                // Get the hotel id, room type, and room price for this room type
                $hotel_id = $_POST['hotel_id'][$room_type];
                $room_price = $_POST['room_price'][$room_type];
                $total_price = $quantity * $room_price;

                // Print the booking information
                echo "Hotel ID: " . $hotel_id . "<br>";
                echo "Room Type: " . $room_type . "<br>";
                echo "Quantity: " . $quantity . "<br>";
                echo "Total Price: " . $total_price  . "<br>";
                echo "From: " . $from . "<br>";
                echo "To: " . $to . "<br>";

                // Get the hotel owner id
                $stmt = $conn->prepare("SELECT ho_id FROM Hotel WHERE h_id = ?");
                $stmt->bind_param("i", $hotel_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if ($row) {
                    $ho_id = $row['ho_id'];
                }

                // Insert the payment information into the database
                $current_time = date('Y-m-d H:i:s', time());
                $default_payment = 'CASH';
                $stmt = $conn->prepare("
            INSERT INTO Payment (p_id, p_amount, p_method, p_time, c_id, ho_id) 
            VALUES (NULL, ?, ?, ?, ?, ?)
        ");

                $stmt->bind_param("issii", $total_price, $default_payment, $current_time, $c_id, $ho_id);
                $stmt->execute();

                // to get the current payment id
                $p_id = $conn->insert_id;

                // Insert the booking information into the database
                $stmt2 = $conn->prepare("
            INSERT INTO Booking (b_id, b_amount, b_from, b_to, p_id) 
            VALUES (NULL, ?, ?, ?, ?)
        ");
                $stmt2->bind_param("issi", $quantity, $from, $to, $p_id);
                $stmt2->execute();
                $b_id = $conn->insert_id; // to get the current booking id 

                // Insert the what type of room is booked in which hotel
                $stmt3 = $conn->prepare("
            INSERT INTO Books_room (b_id, r_type, h_id)
            VALUES (?, ?, ?)
        ");
                $stmt3->bind_param("isi", $b_id, $room_type, $hotel_id);
                $stmt3->execute();
            }
        }

        // Redirect to confirmation page
        echo "Booking confirmed!";
    } else { // If form is not submitted
        echo "No booking information received.";
    }
    ?>
    <!-- bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>