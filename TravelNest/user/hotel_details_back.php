<!-- when user clicks on a hotel to know more, this page begins to work in behind.  -->

<?php
require_once('dbconnect.php');

if (isset($_GET['h_id'])) {
    $h_id = $_GET['h_id'];

    // sql query to find information based on the hotel id
    $stmt1 = $conn->prepare("SELECT * FROM Hotel WHERE h_id = ?");
    $stmt1->bind_param("i", $h_id);
    $stmt1->execute();
    $hotel = $stmt1->get_result()->fetch_assoc();

    // sql query to find features based on the hotel id
    $stmt2 = $conn->prepare("SELECT h_features FROM Hotel_features WHERE h_id = ?");
    $stmt2->bind_param("i", $h_id);
    $stmt2->execute();
    $features = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

    // sql query to find rooms based on the hotel id
    $stmt3 = $conn->prepare("SELECT * FROM Room WHERE h_id = ?");
    $stmt3->bind_param("i", $h_id);
    $stmt3->execute();
    $rooms = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);

    // sql query to find images based on the hotel id and pushing the image address into the array
    $stmt4 = $conn->prepare("SELECT h_image FROM Hotel_image_archive WHERE h_id = ?");
    $stmt4->bind_param("i", $h_id);
    $stmt4->execute();
    $result4 = $stmt4->get_result();

    $Hotel_images = array();
    while ($row = $result4->fetch_assoc()) {
        array_push($Hotel_images, $row["h_image"]);
    }
}

if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];

    // sql query to find b_from, b_to from booking table and used join query to get the h_id from booking table with the help of b_id
    $stmt = $conn->prepare("
    SELECT Booking.b_from, Booking.b_to, Books_room.h_id
    FROM Booking
    JOIN Books_room ON Booking.b_id = Books_room.b_id");
    $stmt->execute();
    $result = $stmt->get_result();
    $bookings = $result->fetch_all(MYSQLI_ASSOC);


    // array to store the count of how many rooms are booked based on the room type
    $room_bookings = array();
    $quantity = array();
    $visited_b_ids = array();


    // loop to check the amount of availability of the rooms
    foreach ($bookings as $booking) {
        // if the hotel id is same and b_from and b_to is in between the selected dates then it will execute the query
        if ($booking['h_id'] == $h_id && !(($booking['b_from'] < $from && $booking['b_to'] < $from) || ($booking['b_from'] > $to && $booking['b_to'] > $to))) {

            // sql query to find which room type is booked and how many rooms are booked based on the room type based on the hotel id and b_from and b_to
            $stmt5 = $conn->prepare("
            SELECT Books_room.r_type, Booking.b_amount, Booking.b_id 
            FROM Books_room
            JOIN Booking ON Books_room.b_id = Booking.b_id 
            WHERE Books_room.h_id = ? AND Booking.b_from = ? AND Booking.b_to = ?
            ");
            $stmt5->bind_param("iss", $h_id, $booking['b_from'], $booking['b_to']);
            $stmt5->execute();
            $result = $stmt5->get_result();
            while ($row = $result->fetch_assoc()) {
                $quantity[] = $row;
            }
            foreach ($quantity as $booking) {
                // if the b_id is not in the visited array then it will execute the query. This is done to avoid the duplicate b_id and to count the room type only once.
                if (!in_array($booking['b_id'], $visited_b_ids)) {
                    // Add the b_id to the visited array
                    $visited_b_ids[] = $booking['b_id'];

                    if (array_key_exists($booking['r_type'], $room_bookings)) {
                        $room_bookings[$booking['r_type']] += $booking['b_amount'];
                    } else {
                        $room_bookings[$booking['r_type']] = $booking['b_amount'];
                    }
                }
            }
            // checking of how many rooms are available ended
        }
    }
}
