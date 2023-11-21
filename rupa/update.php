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
    <head></head>
    <body>
    <form class="row g-3" method="post" action="updatefinal.php">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $row['email']?>" readonly required>
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo $row['name']?>" readonly  required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Address</label>
          <input type="text" class="form-control" id="inputPassword4" name="address" value="<?php echo $row['address']?>" required>
        </div>

        <div class="col-12">
          <label for="inputAddress" class="form-label">ID</label>
          <input type="text" class="form-control" id="inputAddress" name="id" value="<?php echo $row['st_id']?>" readonly required>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">CGPA</label>
          <input type="text" class="form-control" id="inputAddress" name="cgpa" value="<?php echo $row['cgpa']?>" readonly>
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Phone</label>
          <input type="number" class="form-control" id="inputAddress2" name="phn" value="<?php echo $row['phone']?>" >
        </div>
        <input type="hidden" name="studnt_id" value="<?php echo $row['id']?>" >
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
        </body>
</html>

<?php 
    
}else{
   // header('location: index.php');
}?>