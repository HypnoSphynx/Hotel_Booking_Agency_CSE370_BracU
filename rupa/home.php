<?php 
session_start();
$userEmail ='';
$id ='';

   if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
    $userEmail = $_SESSION['user'];
    $id = $_SESSION['user_id'];
}

if($userEmail){
?>

<!DOCTYPE html>
    <html>
    <head>
            <title>Home Page</title>
            <link rel="stylesheet" href="home.css">
            <style>
                .header-home{
                    padding-bottom: 15px;
                }
            </style>
        </head>
        <body class="body-class">


            <div class="header-home">
            <?php include 'template/header.php'; ?>
            </div>
        
            <div class="page-box">
                <a href="studentprofile.php">
                    <button class="page-button">
                        Student Profile
                    </button>
                </a>
            </div>
            <div class="page-box">
                <button class="page-button">
                    Grade Sheet
                </button>
            </div>
            <div class="page-box">
                <button class="page-button">
                    Advised Courses
                </button>
            </div>
            <div class="page-box">
                <button class="page-button">
                    Schedule
                </button>
            </div>
            <div class="page-box">
                <button class="page-button">
                    Advising
                </button>
            </div>
        </body>
    </html>
 
<?php }else{
   // header('location: index.php');
}?>