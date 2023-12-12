<!-- That is what a owner will see during registration -->
<?php include 'authentication.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Register Your Hotel</title>
    <link rel="stylesheet" href="css/owner_register_design.css">
</head>

<body>
    <?php include 'owner_navbar.php' ?>
    <form action="hotel_register_back.php" class="box" method="post" enctype="multipart/form-data">

        <h1>Registration</h1>
        <br>
        <hr>
        <input type="text" name="h_name" placeholder="Hotel Name">
        <input type="text" name="h_number" placeholder="Number">
        <input type="text" name="h_email" placeholder="Email">
        <input type="text" name="h_location" placeholder="Location">
        <input type="text" name="h_description" placeholder="Hotel Description">

        <input type="file" name="h_image">

    <select id="roomCount" onchange="generateInputs()">
        <option value="0">Select number of room types</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>

    <!-- Add this input field to send the roomCount value to the server -->
    <input type="hidden" name="roomCount" id="roomCountInput">

    <div id="roomInputs"></div>

    <input type="submit" name="" value="Register">
</form>

<script>
function generateInputs() {
    var roomCount = document.getElementById('roomCount').value;
    var roomInputs = document.getElementById('roomInputs');
    roomInputs.innerHTML = '';

    for (var i = 0; i < roomCount; i++) {
        roomInputs.innerHTML += '<input type="text" name="r_type' + i + '" placeholder="Room Type ' + (i + 1) + '">';
        roomInputs.innerHTML += '<input type="text" name="r_price' + i + '" placeholder="Room Price ' + (i + 1) + '">';
        roomInputs.innerHTML += '<input type="text" name="r_quantity' + i + '" placeholder="Room Quantity ' + (i + 1) + '">';
    }

    // Set the value of the roomCountInput field to the roomCount value
    document.getElementById('roomCountInput').value = roomCount;
}
</script>

</body>

</html>