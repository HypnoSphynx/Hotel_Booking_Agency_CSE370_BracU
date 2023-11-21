<?php
include 'connection.php';
session_start();
$userEmail = '';
$id = '';

if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
    $userEmail = $_SESSION['user'];
    $id = $_SESSION['user_id'];
}


$courseCode = $_GET['course_code'];
$scNumber = $_GET['sc_number'];
$semester = 'Summer 2023';
//Dropping the course
$sql = "DELETE FROM advised_course2 WHERE C_code = '$courseCode' AND section = $scNumber AND Semester = '$semester' and st_id = $id;";
$result = mysqli_query($conn, $sql);

if ($result){
    //increasing # of seats--->
    $sql4 = "UPDATE section SET Seat_status = Seat_status + 1 WHERE Course_code='$courseCode' and Number='$scNumber';";
    $result4 = mysqli_query($conn, $sql4);
    header('Location:advisedCourses.php');
}
