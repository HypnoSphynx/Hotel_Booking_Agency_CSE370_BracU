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

$selectSql = "SELECT * FROM advised_course2 WHERE st_id = '$id' AND Semester = '$semester'";

$result = mysqli_query($conn, $selectSql);

if ($result) {
    $numRows = mysqli_num_rows($result);  // Get the number of rows
    if ($row = mysqli_fetch_assoc($result)) {
        $creditPerSemester = $row['credit_per_semester'];
    } else {
        $creditPerSemester = 3;
    }
} else {
    $numRows = 0;
    $creditPerSemester = 3;
}

if($numRows<5){
    //check if pre req done
    $sql1 = "SELECT c.prerequisite FROM courses c WHERE c.course_code='$courseCode';";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);
    if ($row1["prerequisite"]){
        $preq = $row1["prerequisite"];
        $sql2 = "SELECT c.C_code FROM advisedcourse2 c WHERE c.C_code = '$preq';"; 
        $result2 = mysqli_query($conn, $sql2);
        if (!$result2){
            echo "<script>alert('You have not completed the prerequisite course yet');</script>";
            echo "<script>window.location.href = 'advising.php';</script>";
        }
    }else{ //CHECK IF COURSE TAKEN ALREADY
        $sql1 = "SELECT C_code FROM advised_course2 WHERE C_code = '$courseCode' and Semester='$semester' and st_id='$id';"; 
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_fetch_assoc($result1)){
            echo "<script>alert('You have already taken this course in this semeter');</script>";
           echo "<script>window.location.href = 'advising.php';</script>";
        }
        else{
            // Check seat status -->
            $sql3 = "SELECT Seat_status FROM section where Course_code='$courseCode' and Number='$scNumber';";
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);
            if($row3['Seat_status'] < 1){
                echo "<script>alert('You have no seats available for this section');</script>";
                echo "<script>window.location.href = 'advising.php';</script>";
            }else{
                // check if class clashes-->
                $sql5 = "SELECT sc.days, sc.Time from class_schedule sc where C_code = '$courseCode' AND  section='$scNumber' ;";
                $result5 = mysqli_query($conn, $sql5);
                $row5 = mysqli_fetch_assoc($result5);
                $day = $row5['days'];
                $time = $row5['Time'];
                $sql6 = "SELECT * FROM class_schedule sc, advised_course2 a WHERE a.C_code = sc.C_code AND a.section=sc.section And sc.Time='$time' AND sc.days='$day' AND a.st_id = '$id';";
                $result6 = mysqli_query($conn, $sql6);
                if(mysqli_fetch_assoc($result6)){
                    echo "<script>alert('Class time clashes!');</script>";
                    echo "<script>window.location.href = 'advising.php';</script>";
                }else{
                    // check if exam time clashes-->

                    $sql7 = "SELECT exam_date, exam_time FROM courses WHERE course_code='$courseCode';";
                    $result7 = mysqli_query($conn, $sql7);
                    $row7 = mysqli_fetch_assoc($result7);
                    $examtime = $row7['exam_time'];
                    $examdate = $row7['exam_date'];

                    $sql8 = "SELECT * FROM courses c, advised_course2 a WHERE c.course_code = a.C_code AND c.exam_date = '$examdate' AND c.exam_time='$examtime' AND a.st_id = '$id';";
                    $result8 =  mysqli_query($conn, $sql8);
                    if(mysqli_fetch_assoc($result8)){
                        echo "<script>alert('Exam time clashes!');</script>";
                        echo "<script>window.location.href = 'advising.php';</script>";
                    }else{
                        $newNumberOfCourse = $numRows+1;
                        $sql = "INSERT INTO `advised_course2` (`Semester`, `st_id`, `section`, `C_code`, `credit_per_semester`, `number_of_course`) VALUES ('$semester', '$id', '$scNumber', '$courseCode', '3', '$newNumberOfCourse')";
            
                        if (mysqli_query($conn, $sql)) {
                            echo "Record inserted successfully.";
                        } else {
                            echo "Error inserting record: " . mysqli_error($conn);
                        }
        
                        //Changing seat status-->
        
                        $sql4 = "UPDATE section SET Seat_status = Seat_status - 1 WHERE Course_code='$courseCode' and Number='$scNumber';";
                        if (mysqli_query($conn, $sql4)) {
                            echo "Seat status changed successfully.";
                            echo "<script>alert('DONE!!');</script>";
                            echo "<script>window.location.href = 'advising.php';</script>";
                        } else {
                            echo "Error changing seat status: " . mysqli_error($conn);
                        }
                        header('Location:advising.php');
                    }
                    
                }   
            }
        }
    }   
}
else{
    echo "<script>alert('You have reached the maximum number of courses for this semester');</script>";
    echo "<script>window.location.href = 'home.php';</script>";
}

?>
