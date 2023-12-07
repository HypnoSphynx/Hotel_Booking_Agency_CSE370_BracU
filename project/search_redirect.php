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

    // sql query to find images based on the hotel id
    $stmt4 = $conn->prepare("SELECT h_image FROM Hotel_image_archive WHERE h_id = ?");
    $stmt4->bind_param("i", $h_id);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    $Hotel_images = array(); // initialize as an empty array

    while ($row = $result4->fetch_assoc()) {
        array_push($Hotel_images, $row["h_image"]);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Details</title>

   <head>
    <title>Hotel Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="search_redirect.css">
</head>
</head>
<body>
<div class="container">
    <h1><?php echo $hotel['h_name']; ?></h1>

    <!-- image passing -->
    <?php if (!empty($Hotel_images)): ?>
        <?php foreach ($Hotel_images as $hotel_image): ?>
            <img src="./owner/hotel_pic/<?php echo $hotel_image; ?>" alt="Hotel image">
        <?php endforeach; ?>
    <?php else: ?>
        <img src="./owner/hotel_pic/default_hotel.png" alt="Default hotel image">
    <?php endif; ?>


    <!-- printing other values -->
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


        <!-- Calender to check availability -->
        <form method="post">
            <label for="from">From:</label>
            <input type="date" id="from" name="from">
            <label for="to">To:</label>
            <input type="date" id="to" name="to">
            <input type="submit" name="submit" value="Check Availability">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $from = $_POST['from'];
            $to = $_POST['to'];

            $stmt4 = $conn->prepare("SELECT r_quantity FROM Room WHERE r_from IS NULL AND r_to IS NULL AND h_id = ?");
            $stmt5->bind_param("i", $h_id);
            $stmt5->execute();
            $result = $stmt5->get_result();
            $quantity = $stmt5->get_result()->fetch_all(MYSQLI_ASSOC);

        }
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Price</th>
                    
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td><?php echo $room['r_type']; ?></td>
                        <td><?php echo $room['r_price']; ?></td>
                        <td><?php echo $room['r_quantity']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>