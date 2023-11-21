
<?php
include "connection.php";
session_start();
$userEmail ='';
$id ='';

   if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
    $userEmail = $_SESSION['user'];
    $id = $_SESSION['user_id'];
}

if($userEmail){
    $sql = "SELECT c.C_code, s.room_number, s.days, s.section, s.Time from class_schedule s, advised_course2 c where c.st_id ='$id' and c.C_code = s.C_code and c.section = s.section and c.Semester='summer 2023'; ";

    $result = mysqli_query($conn, $sql) or die("Couldn't connect to courses database");
}
?>


<!DOCTYPE html> 
<html lang="en">
    <head>
        <title> Class Schedule </title>
        <style>
            .head-container{
                display: flex;
                flex-direction: row;
                width: 100%;
                padding-top: 9px;
            }
            .title-container{
                border-color: rgb(240,248,255);
                border-style: groove;
                border-width: 5px;
                background-color: rgb(240,248,255);
                height: 38px;
                flex: 1;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 18px;
            }

        </style>

    </head>
    
    <body class ="bg-dark">
            <div class="head-container">
                <div class="title-container">Course Code</div>
                <div class="title-container">Section</div>
                <div class="title-container">Class Days</div>
                <div class="title-container">Class time</div>
                <div class="title-container">Room Number</div>
            </div>  
                <?php 
                while ($row=mysqli_fetch_assoc($result))
                {
                ?>
            <div class="head-container">
                <div class="title-container"><?php echo $row["C_code"]; ?></div>
                <div class="title-container"><?php echo $row["section"]; ?> </div>
                <div class="title-container"><?php echo $row["days"]; ?> </div>
                <div class="title-container"><?php echo $row["Time"]; ?></div>
                <div class="title-container"><?php echo $row["room_number"]; ?></div>
            </div> 

                <?php 
                }
                ?>
    </body>            