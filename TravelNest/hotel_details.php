<!-- when user clicks on a hotel to know more, this page shows all the work and confirmation  -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/user_profile.css">

    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Hotel Details</title>
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

    <!-- importing back -->
    <?php include 'hotel_details_back.php' ?>

    <!-- Start of Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Travel Nest</a>
        <!-- Search -->
        <form class="form-inline my-2 my-lg-0" action="search_result.php" class="box" method="post">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <!-- Button to All Hotels -->
        <a href="all_hotel.php" class="btn btn-outline-info my-2 my-sm-0 ml-2">All Hotels</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left:64%">
            <ul class="navbar-nav mr-auto">
                <!-- sign up -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
                        Sign Up
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user/user_signup_front.php">User</a>
                        <a class="dropdown-item" href="owner/owner_signup_front.php">Hotel Owner</a>
                    </div>
                </li>

                <!-- login  -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
                        Login
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user/user_login_front.php">User</a>
                        <a class="dropdown-item" href="owner/owner_login_front.php">Hotel Owner</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
    <!-- End of Navbar -->


    <!-- showing hotel details -->
    <!--Finding image-->
    <div class="row">
        <div class="column">
            <?php if (!empty($Hotel_images)) : ?>
                <!-- image passing -->
                <?php foreach ($Hotel_images as $hotel_image) : ?>
                    <img src="./owner/hotel_pic/<?php echo $hotel_image; ?>" alt="Hotel image" style='max-height:500px; max-width:100%'>
                <?php endforeach; ?>
                <!-- if no image found then it will show default image -->
            <?php else : ?>
                <img src="./owner/hotel_pic/default_hotel.jpg" alt="Hotel image" style='max-height:500px; max-width:100%'>
            <?php endif; ?>
        </div>


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
    </div>
    <!-- end of showing hotel details -->


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
                                        // Get the from and to dates from the form
                                        $from = $_POST['from'];
                                        $to = $_POST['to'];

                                        // Print the from and to dates enterd by the user
                                        echo "From: " . $from . "<br>";
                                        echo "To: " . $to . "<br>";
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
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- if the user is logged in then it will show the booking button else it will show the signup button -->
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

                        </form>
                        <a href='user/user_login_front.php'><div style="margin-top:1%"><input type="submit" value="Signup for Booking"></div></a>
                </div>
            </div>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>