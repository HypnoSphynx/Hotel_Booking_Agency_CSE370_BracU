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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>title here</title>
    <style>
        .con {
            background: white;

            display: grid;
            width: 200%;
            grid-template-columns: 1fr 1fr;
            height: 500px;
            column-gap: 5px;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 500px;
            margin-bottom: 30px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
            height: 500px;
            margin-bottom: 30px;
        }


        .im-box {

            width: 50%;
            border: 15px;
            margin-bottom: 30px;
            height: 500px;

        }

        body {
            background: rgb(245, 178, 207);
            background: radial-gradient(circle, rgba(245, 178, 207, 1) 0%, rgba(148, 191, 233, 0.8995973389355743) 100%);
        }

        .ho-details {
            margin-left: 55%
        }
    </style>

</head>

<body>

    <?php include 'user_navbar.php' ?>
    <?php include 'hotel_details_back.php' ?>

    <div class="row">
  <div class="column" >
        <?php if (!empty($Hotel_images)) : ?>
        <!-- image passing -->
        <?php foreach ($Hotel_images as $hotel_image) : ?>
            <img src="..\owner/hotel_pic/<?php echo $hotel_image; ?>" alt="Hotel image" style='max-height:500px; max-width:100%'>
        <?php endforeach; ?>
        <?php else : ?>
            <img src="..\owner/hotel_pic/default_hotel.jpg" alt="Hotel image" style='max-height:500px; max-width:100%' >
        <?php endif; ?></div> 



        <div class="column">
            <h2>Information</h2>
            <h4>Hotel:<?php echo '  ' . $hotel['h_name'] . '    '; ?> <br>Location: <?php echo $hotel['h_location']; ?> <br>Email: <?php echo $hotel['h_email'] . '    '; ?> <br> </h4>
            <p><?php echo $hotel['h_description'] . '    '; ?></p>
            <p>Number: <?php echo $hotel['h_number']; ?></p>
            <p></p>
            <h2>Features</h2>
            <ul>
                <!-- as featature is a multivalued item so using loop to displaying the values -->
                <?php foreach ($features as $feature) : ?>
                    <li><?php echo $feature['h_features']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>


    </div>




    <!-- Calender -->
    <form method="post">
        <label for="from">From:</label>
        <input type="date" id="from" name="from">
        <label for="to">To:</label>
        <input type="date" id="to" name="to">
        <input type="submit" name="submit" target="__self" value="Check Availability">
    </form>

   

    <!-- checking room availability using the selected dates -->


    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="table-responsive px-3">
                        <table class="table table-striped align-middle table-nowrap">
                            <tbody>
                                <tr>
                            <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the from and to dates
        $from = $_POST['from'];
        $to = $_POST['to'];

        // Print the from and to dates
        echo "From: " . $from . "<br>";
        echo "To: " . $to . "<br>";

        // ... rest of your code ...
    }
    ?>
                                </tr>
                                <tr>
                                    <!-- just coloum heading -->
                                    <th>Type</th>
                                    <th>Per Night Cost</th>
                                    <th>Quantity</th>
                                    <th></th>
                                    <!-- running loop to display all the rooms of a hotel -->
                                </tr> <?php foreach ($rooms as $room) : ?>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 class="font-size-18"><a href="ecommerce-product-detail.html" class="text-dark"><?php echo $room['r_type']; ?></a></h5>
                                            </div>
                                        </td>

                                        <td>
                                            <h3 class="mb-0 font-size-20"><span class="text-muted me-2"></span><b><?php echo $room['r_price']; ?></b></h3>
                                        </td>
                                        <!-- checking if the room type is in the array then it will subtract the b_amount from the total quantity of the room type else it will show the total quantity of the room type -->
                                        <td><?php echo isset($room_bookings[$room['r_type']]) ? $room['r_quantity'] -= $room_bookings[$room['r_type']] : $room['r_quantity']; ?></td>
                                        <td>
                                            <!-- form to book the room -->

                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                                <!-- ... existing code ... -->

                            </tbody>
                        </table>

                        <form action="hotel_confirm.php" method="post">
                            <!-- running loop based on per loop -->
                            <?php foreach ($rooms as $room) : ?>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><?php echo $room['r_type']; ?></span>

                                    <!-- choosing how many rooms needed -->
                                    <select name="quantity[<?php echo $room['r_type']; ?>]" class="form-control">
                                        <?php for ($i = 0; $i <= $room['r_quantity']; $i++) : ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>

                                    <!-- sending this values to user_confirmations -->
                                    <input type="hidden" name="hotel_id[<?php echo $room['r_type']; ?>]" value="<?php echo $h_id; ?>">
                                    <input type="hidden" name="room_type[<?php echo $room['r_type']; ?>]" value="<?php echo $room['r_type']; ?>">
                                    <input type="hidden" name="room_price[<?php echo $room['r_type']; ?>]" value="<?php echo $room['r_price']; ?>">

                                </div>
                            <?php endforeach; ?>

                            <input type="hidden" name="from" value="<?php echo $from; ?>">
                            <input type="hidden" name="to" value="<?php echo $to; ?>">
                            <div style="margin-top:1%"><input type="submit" value="Confirm"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>