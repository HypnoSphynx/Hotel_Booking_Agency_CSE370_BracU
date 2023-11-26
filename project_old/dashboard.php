<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='dashboard.css'>

</head>
<body class="background-color">
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
    <div class='user-information'> 
      <h3><text style="color:white; margin-left:500px; font-size:40px">User Information<text></h3>
      <div style='margin-top:200px'>
      <h2><text style='color:white'>Name:<text></h3>
      <h2><text style='color:white'>User ID:<text></h3>
      <h2><text style='color:white; margin-top:200px'>Email:<text></h3>
      <h2><text style='color:white'>Contact Number: <text></h3>
      <h2><text style='color:white'><text>Total Orders:</h3>


</div>


    </div>
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
