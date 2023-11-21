<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='dashboard.css'>

</head>
<body>
<!--Sidebar line 10-line 19-->
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="dashboard.php">My Profile</a>
  <a href="orders.php">Orders</a>
  <a href="account.php">Account settings</a>
  <a href="#">empty</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Travel Nest</button>  

  <div class="main-content">
    <div class='login-box'> hey</div>
  <div>
    
       
      


<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 
