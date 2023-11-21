<?php 
session_start();
$userEmail ='';
$id ='';
    include 'connection.php';
   if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
    $userEmail = $_SESSION['user'];
    $id = $_SESSION['user_id'];
 
   }

   $sql="SELECT * from student WHERE id = $id;";

   $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
   $row = mysqli_fetch_assoc($result);

   if($userEmail){
    
?>




<!DOCTYPE html>
    <html>

    <head>
        <title>Student Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </head>

        <body >
            <div class="container-fluid mt-5">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Student name</th>
                        <th scope="col">ID</th>
                        <th scope="col">Credits</th>
                        <th scope="col">CGPA</th>
                        <th scope="col">phone</th>
                        <th scope="col" >address</th>
                        <th scope="col" >action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                       <tr>
                            <th > <?php echo $row['name']?></th>
                            <td><?php echo $row['st_id']?></td> 
                            <td></td>
                            <td><?php echo $row['cgpa']?></td>
                            <td><?php echo $row['phone']?></td>
                            <td><?php echo $row['address']?></td>
                            <td><a href="update.php">update</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        
        </body>
    </html>

<?php }else{
   // header('location: index.php');
}?>