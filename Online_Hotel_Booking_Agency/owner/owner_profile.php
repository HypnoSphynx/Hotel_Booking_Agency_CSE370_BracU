<?php

include 'authentication.php' ?>

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
    <title>Travel Nest</title>
</head>

<body>
    <?php include 'owner_navbar.php' ?>
    <!--Account Information Section-->
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="edit_owner_profile.php" target="__self">Profile</a>
            <a class="nav-link active ms-0" href="pass_change_front.php" target="__self">Change Password</a>

        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-10">
                <div class="col-xl-14">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <!--Getting owner info-->
                            <form action="">
                                <?php
                                include 'dbconnect.php';
                                $currentUser = $_SESSION['email'];

                                $sql = "SELECT * FROM Hotel_Owner WHERE ho_email='$currentUser'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        // runnig while loop to fetch data from database
                                        while ($row = mysqli_fetch_array($result)) {
                                            $name = $row['ho_name'];
                                            $email = $row['ho_email'];
                                            $number = $row['ho_number'];
                                            $gender = $row['ho_gender'];
                                            $address = $row['ho_address'];
                                        }
                                    }
                                }
                                ?>

                                <div class="mb-3">
                                    <!-- Name Box-->
                                    <label class="small mb-1" for="inputUsername">Name</label>
                                    <input class="form-control" id="inputUsername" type="text" value='<?php echo $name ?>'>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Email Box-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Email</label>
                                        <input class="form-control" id="inputFirstName" type="text" value='<?php echo $email ?>''>
                                </div>
                                <!-- Number Box-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Number</label>
                                    <input class="form-control" id="inputLastName" type="text"  value=' <?php echo $number ?>'>
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- User Class Box-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Gender</label>
                                        <input class="form-control" id="inputOrgName" type="text" value='<?php echo $gender ?>'>
                                    </div>
                                    <!-- Gender Box-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Address</label>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value='<?php echo $address ?>'>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</body>

</html>