<!-- to show all hotels when you are logged in -->

<?php
include 'authentication.php';?>

<!DOCTYPE html>
<html>

<head>
    <!-- importing bootstrap and CSS -->
    <link rel="stylesheet" href="search_result.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    body{
        background: rgb(245,178,207);
        background: radial-gradient(circle, rgba(245,178,207,1) 0%, rgba(148,191,233,0.8995973389355743) 100%);
    }
    

</style>
</head>

<body>

    <!-- importing navbar -->
    <?php include 'user_navbar.php' ?>

    <?php
    require_once('dbconnect.php');

    // query to find all hotels
    $stmt = "SELECT h.h_id, h.h_name, h.h_location, h.h_email FROM Hotel h";
    $result = mysqli_query($conn, $stmt);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Hotel_name = $row["h_name"];
            $Hotel_location = $row["h_location"];
            $Hotel_email = $row["h_email"];

              // finding the hotel features then initializing an empty array and pushing the features into the array
            $stmt3 = "SELECT h_features FROM Hotel_features WHERE h_id = " . $row["h_id"];
            $result3 = mysqli_query($conn, $stmt3);
            
            $Hotel_features = array(); 
            while ($row3 = mysqli_fetch_assoc($result3)) {
                array_push($Hotel_features, $row3["h_features"]);
            }

            // finding the hotel images then initializing an empty array and pushing the image address into the array
            $stmt4 = "SELECT h_image FROM Hotel_image_archive WHERE h_id = " . $row["h_id"];
            $result4 = mysqli_query($conn, $stmt4);
            
            $Hotel_images = array();
            while ($row4 = mysqli_fetch_assoc($result4)) {
                array_push($Hotel_images, $row4["h_image"]);
            }

            // finding the max and min price room of the hotel
            $stmt5 = "SELECT MAX(r_price) as max_price, MIN(r_price) as min_price FROM Room WHERE h_id = " . $row["h_id"];
            $result5 = mysqli_query($conn, $stmt5);

            if ($row5 = mysqli_fetch_assoc($result5)) {
                $max_price = $row5["max_price"];
                $min_price = $row5["min_price"];
            }

            $noresults = false;  // to make sure that the no results found jumbotron is not displayed

            //choosing the first image from the array of images
            $imageSrc = !empty($Hotel_images) ? '..\owner/hotel_pic/' . $Hotel_images[0] : '..\owner/hotel_pic/default_hotel.jpg';

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
                            <p class="value3 mt-sm">'.$min_price.'TK - '.$max_price.'TK</p>
                            <p class="fs-mini text-muted" >Per Night</p>
                            <a class="btn btn-primary btn-info btn-sm" href="hotel_details.php?h_id=' . $row["h_id"] . '">View Rooms</a>
                        </div>
                    </div>
                </div>
            </div> ';
                     //Printing Hotel Details ends here
;
        }
    } else {  //it will show error when no hotel is in db
        echo '<div class="jumbotron jumbotron-fluid"> 
            <div class="container">
                <p class="display-4">No Results Found</p>
                </p>
            </div>
         </div>';
    }
    mysqli_close($conn);
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>