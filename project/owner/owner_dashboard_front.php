<?php require_once('dbconnect.php'); ?>
<?php include 'authentication.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="search_result.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background: rgb(245, 178, 207);
            background: radial-gradient(circle, rgba(245, 178, 207, 1) 0%, rgba(148, 191, 233, 0.8995973389355743) 100%);
        }

        .info-box {
            border: 1px solid #000;
            padding: 10px;
            margin: 10px 0;
            width: 200px;
            text-align: center;
            background-color: #f9f9f9;
        }
    </style>

</head>

<body>

    <!-- importing navbar -->
    <?php include 'owner_navbar.php' ?>


<?php include 'owner_dashboard_back.php' ?>

<div class="col-md-12 col-md-pull-3" style="border-style:groove; width:180%">
    <?php
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $count++;
    ?>
        <div class="col-md-12 col-md-pull-3" style="border-style:groove; width:180%">
                <div class="search-result-item-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <h4 class="search-result-item-heading"> <?php echo $row['h_name'] ?></a></h4>
                            <p class="info">Hotel_id: <?php echo $row['h_id'] ?></p>
                            <p class="info">Location: <?php echo $row['h_location'] ?></p>
                        </div>
                        <div class="col-sm-3 text-align-center" style="margin-top:3%">
                        <a class="btn btn-primary btn-info btn-sm" href="hotel_edit_front.php?h_id=<?php echo $row['h_id']; ?>">Edit Information</a>
                        </div>
                    </div>
                </div>
                </div>
        <?php
        }
        ?>

        <p class="info-box">Total Hotels: <?php echo $count; ?></p>
        <p class="info-box">Total Earned: <?php echo $total_amount; ?></p>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>