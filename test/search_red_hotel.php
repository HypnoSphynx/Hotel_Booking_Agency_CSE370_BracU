<?php
require_once('dbconnect.php');

if (isset($_GET['h_id'])) {
    $h_id = $_GET['h_id'];

    // Prepare and execute the SQL queries
    $stmt1 = $conn->prepare("SELECT * FROM Hotel WHERE h_id = ?");
    $stmt1->bind_param("i", $h_id);
    $stmt1->execute();
    $hotel = $stmt1->get_result()->fetch_assoc();

    $stmt2 = $conn->prepare("SELECT h_features FROM Hotel_features WHERE h_id = ?");
    $stmt2->bind_param("i", $h_id);
    $stmt2->execute();
    $features = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

    $stmt3 = $conn->prepare("SELECT * FROM Room WHERE h_id = ?");
    $stmt3->bind_param("i", $h_id);
    $stmt3->execute();
    $rooms = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $hotel['h_name']; ?></h1>
        <p>Location: <?php echo $hotel['h_location']; ?></p>
        <p>Number: <?php echo $hotel['h_number']; ?></p>
        <p>Email: <?php echo $hotel['h_email']; ?></p>
        <p>Rating: <?php echo $hotel['h_rating']; ?></p>
        <h2>Features</h2>
        <ul>
            <?php foreach ($features as $feature): ?>
                <li><?php echo $feature['h_features']; ?></li>
            <?php endforeach; ?>
        </ul>
        <h2>Rooms</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Floor Number</th>
                    <th>Serial Number</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Availability</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td><?php echo $room['r_floorNo']; ?></td>
                        <td><?php echo $room['r_serialNo']; ?></td>
                        <td><?php echo $room['r_price']; ?></td>
                        <td><?php echo $room['r_type']; ?></td>
                        <td><?php echo $room['r_availability'] == 0 ? 'Unavailable' : 'Available'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>