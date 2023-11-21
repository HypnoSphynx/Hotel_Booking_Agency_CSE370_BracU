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

   $sql="SELECT g.Course_code, g.Grade, g.GPA, c.name from courses c, gradesheet g where c.course_code = g.course_code and g.st_id='21561478';";

   $result = mysqli_query($conn, $sql) or die("Couldn't connect to courses database");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Grade Sheet</title>
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
    <body>
        <div class="head-container">
            <div class="title-container" style="background-color: rgb(199, 199, 199);" >Course Code</div>
            <div class="title-container" style="background-color: rgb(199, 199, 199);">Course Name</div>
            <div class="title-container" style="background-color: rgb(199, 199, 199);">GPA</div>
            <div class="title-container" style="background-color: rgb(199, 199, 199);">Grade</div>
            <div class="title-container" style="background-color: rgb(199, 199, 199);">Credit</div>

        </div>

        <?php 
                while ($row=mysqli_fetch_assoc($result))
                {
                ?>
            <div class="head-container">
                <div class="title-container"><?php echo $row["Course_code"]; ?></div>
                <div class="title-container"><?php echo $row["name"]; ?> </div>
                <div class="title-container"><?php echo $row["GPA"]; ?> </div>
                <div class="title-container"><?php echo $row["Grade"]; ?> </div>
                <div class="title-container">3</div>
            </div> 
        <?php 
              }
            ?>
    </body>
</html>


<?php }else{
   // header('location: index.php');
}?>