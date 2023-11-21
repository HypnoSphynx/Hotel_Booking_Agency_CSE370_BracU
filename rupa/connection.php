<?php

    //connecting to database
    $host = "localhost";
    $user = "rupkatha";
    $pass = "12345";
    $db_name = "db1";

    $conn = mysqli_connect($host, $user, $pass, $db_name); 

//check connection
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }
?>