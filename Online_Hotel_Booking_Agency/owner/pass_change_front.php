<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<?php 
// include 'dbconnect.php'
// $result = mysqli_query($conn, "SELECT * FROM Customer WHERE c_email='$_SESSION['email']");
// $row=mysqli_fetch_assoc($result);
// $uername=$row['c_name'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/user_profile.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Travel Nest</title>
  </head>
<body>
<!--Nav Bar-->
<?php include 'owner_navbar.php' ?>
    <!--Account Information Section-->
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="owner_profile.php" target="__self">Profile</a>
            <a class="nav-link active ms-0" href="pass_change_front.php" target="__self">Settings</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-10">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <!--Getting USER INFROMATION-->
                            <form action="pass_change_back.php" method="post">

                            <div class="mb-3">
                                <!-- Pass Change-->
                                <label class="small mb-7" for="passwordchange">New Password</label>
                                <input class="form-control" id="newpass" name="newpass" type="password" placeholder="Enter New Password" value=''>
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Confirm Pass change-->
                                <div class="col-md-7">
                                    <label class="small mb-1" for="inputFirstName">Confirm Password</label>
                                    <input class="form-control" id="newpass2" name="newpass2" type="password" placeholder="Confirm New Password" value=''>
                                </div>


                            <!-- Save changes button-->


                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>