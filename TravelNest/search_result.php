<!-- shows the search result based on query -->

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background: rgb(245, 178, 207);
            background: radial-gradient(circle, rgba(245, 178, 207, 1) 0%, rgba(148, 191, 233, 0.8995973389355743) 100%);
        }
    </style>
</head>

<body>
    <!-- Nav Bar -->
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
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


    <?php
    require_once('dbconnect.php');
    $query = $_POST['query'];
    $noresults = true; //taking this variable to check if the search term does match with any hotel name or location or features

    if (!empty($query)) {
        // Query to find the hotel id based on the search term
        $stmt = "SELECT h.h_id FROM Hotel h
        WHERE h_name LIKE '%$query%' OR h_location LIKE '%$query%'
        UNION 
        SELECT h.h_id AS 'Hotel Name' FROM Hotel h
        JOIN Hotel_features hf ON h.h_id = hf.h_id
        WHERE hf.h_features LIKE '%$query%'";

        $result = mysqli_query($conn, $stmt);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                // Finding the hotel name
                $stmt2 = "SELECT h_name, h_location, h_email FROM Hotel WHERE h_id = " . $row["h_id"];
                $result2 = mysqli_query($conn, $stmt2);
                $row2 = mysqli_fetch_assoc($result2);

                $Hotel_name = $row2["h_name"];
                $Hotel_location = $row2["h_location"];
                $Hotel_email = $row2["h_email"];


                // Finding the hotel features and storing them in an array
                $stmt3 = "SELECT h_features FROM Hotel_features WHERE h_id = " . $row["h_id"];
                $result3 = mysqli_query($conn, $stmt3);
                $Hotel_features = array();

                while ($row3 = mysqli_fetch_assoc($result3)) {
                    array_push($Hotel_features, $row3["h_features"]);
                }

                // Finding the hotel images and storing them in an array
                $stmt4 = "SELECT h_image FROM Hotel_image_archive WHERE h_id = " . $row["h_id"];
                $result4 = mysqli_query($conn, $stmt4);
                $Hotel_images = array(); 

                while ($row4 = mysqli_fetch_assoc($result4)) {
                    array_push($Hotel_images, $row4["h_image"]);
                }

                // Finding the max and min price of a room of the hotel
                $stmt5 = "SELECT MAX(r_price) as max_price, MIN(r_price) as min_price FROM Room WHERE h_id = " . $row["h_id"];
                $result5 = mysqli_query($conn, $stmt5);

                if ($row5 = mysqli_fetch_assoc($result5)) {
                    $max_price = $row5["max_price"];
                    $min_price = $row5["min_price"];
                }

                $noresults = false;  // making this variable false because the search term does match with the hotel name or location or features

                //choosing the first image from the array of images
                $imageSrc = !empty($Hotel_images) ? './owner/hotel_pic/' . $Hotel_images[0] : './owner/hotel_pic/default_hotel.jpg';

                echo
                //Printing Hotel Details
                '<div class="col-md-12 col-md-pull-3" style="border-style:groove; width:180%">
                    
                      
                    <div class="search-result-item-body">
                        <div class="row">
                            <div class="col-sm-9">
                            <a class="image-link" href="hotel_details.php?h_id=' . $row["h_id"] . '"><img class="image" src="' . $imageSrc . '" style="height:200px; width:200px; "> </a>
                            
                            <h4 class="search-result-item-heading"><a href="hotel_details.php?h_id=' . $row["h_id"] . '">' . $Hotel_name . '</a></h4>
                                <p class="info">Location:' . $Hotel_location . '</p>
                                <p class="description">Features: ' . implode(", ", $Hotel_features) . '</p>
                                <p class="description">Email: ' . $Hotel_email . '</p>
                            </div>
                            <div class="col-sm-3 text-align-center" style="margin-top:9%">
                                <p class="value3 mt-sm">' . $min_price . 'TK - ' . $max_price . 'TK</p>
                                <p class="fs-mini text-muted" >Per Night</p>
                                <a class="btn btn-primary btn-info btn-sm" href="hotel_details.php?h_id=' . $row["h_id"] . '">View Rooms</a>
                            </div>
                        </div>
                    </div>

                </div> ';
            }
            //printing ends
        }
        // if the search term does not match with any hotel name or location or features
        if ($noresults) {
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Results Found</p>
                        <p class="lead"> Suggestions: <ul>
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                                <li>Try more general keywords. </li></ul>
                        </p>
                    </div>
                 </div>';
        }
        mysqli_close($conn);
    }
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>