<?php 
include 'connection.php';
session_start();
$userEmail ='';
$id ='';

   if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
    $userEmail = $_SESSION['user'];
    $id = $_SESSION['user_id'];
}

if($userEmail){
    $sql = 'SELECT
        courses.course_code,
        courses.prerequisite,
        courses.exam_date,
        courses.exam_time,
        section.Seat_status,
        section.Course_code AS Section_Course_code,
        section.F_initials,
        section.Number as sc_number,
        class_schedule.room_number,
        class_schedule.Time,
        class_schedule.days
    FROM courses
    INNER JOIN section ON courses.course_code = section.Course_code
    INNER JOIN class_schedule ON courses.course_code = class_schedule.C_code;
';
    $result = mysqli_query($conn, $sql) or die("Couldn't connect to courses database");
  
        //
        //
?>

<!DOCTYPE>
<html>
    <head>
        <!-- Include jQuery -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


        <style>
            .table-style{
                border: groove;
                border-width: 4px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <table id="advised_course" class="table table-hover table-stripted table-bordered">
                <thead class="thead_dark">
                    <tr >
                        <th>course code</th>
                        <th>course prerequisite</th>
                        <th>section</th>
                        <th>seat status</th>
                        <th>Faculty</th>
                        <th>class time</th>
                        <th>exam date and time</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    <?php   while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['course_code'];?></td>
                            <td><?php echo $row['prerequisite'];?></td>
                            <td><?php echo $row['sc_number'];?></td>
                            <td><?php echo $row['Seat_status'];?></td>
                            <td><?php echo $row['F_initials'];?></td>
                            <td><?php echo $row['Time'];?></td>
                            <td><?php echo $row['exam_date'].' '.$row['exam_time'];?></td>
                            <td>
                            <a href="addcourse.php?course_code=<?php echo $row['course_code']; ?>&sc_number=<?php echo $row['sc_number']; ?>"
                                class="btn btn-success">Add</a>
                                <!-- <a href="add.php" class="btn btn-success">Add</a> -->
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
       
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   
    <script type="text/javascript">
         $(document).ready(function() {
            // Initialize DataTable
            $('#advised_course').DataTable();
         });
    </script>
</html>
 


<?php 
    
    }
    else{
   // header('location: index.php');
}?>