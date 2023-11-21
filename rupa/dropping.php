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
    $sql = "SELECT a.C_code, c.Name , a.section, s.F_initials from advised_course2 a, section s, courses c where c.course_code=a.C_code and a.st_id = '$id' and a.section=s.Number and a.C_code=s.Course_code; ";

    $result = mysqli_query($conn, $sql) or die("Couldn't connect to courses database");
}
?>

<!DOCTYPE html> 
<html lang="en">
    <head>
        <title> Advised Courses </title>
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
                height: 60px;
                flex: 1;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 22px;
            }

        </style>

    </head>
    
    <body class ="bg-dark">
            <div class="head-container">
                <div class="title-container" style="background-color: rgb(199, 199, 199);">Course Code</div>
                <div class="title-container" style="background-color: rgb(199, 199, 199);">Course Name</div>
                <div class="title-container" style="background-color: rgb(199, 199, 199);">Section</div>
                <div class="title-container" style="background-color: rgb(199, 199, 199);">Instructor</div>
                <div class="title-container" style="background-color: rgb(199, 199, 199);">Action</div>
            </div>  
                <?php 
                while ($row=mysqli_fetch_assoc($result))
                {
                ?>
            <div class="head-container">
                <div class="title-container"><?php echo $row["C_code"]; ?></div>
                <div class="title-container"><?php echo $row["Name"]; ?> </div>
                <div class="title-container"><?php echo $row["section"]; ?> </div>
                <div class="title-container"><?php echo $row["F_initials"]; ?></div>
                <div class="title-container"><a href="dropcourse.php?course_code=<?php echo $row['C_code']; ?>&sc_number=<?php echo $row['section']; ?>"
                                >Drop Course</a>
                </div>
                
            </div> 
        <?php 
              }
            ?>
    </body>    






   
