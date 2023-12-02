<?php
require_once('dbconnect.php');
$query = $_POST['query'];

if(!empty($query)) {
  
    $stmt = "SELECT h.h_name AS 'Hotel Name' FROM Hotel h
    WHERE h_name LIKE '%$query%' OR h_location LIKE '%$query%'
    UNION 
    SELECT h.h_name AS 'Hotel Name' FROM Hotel h
    JOIN Hotel_features hf ON h.h_id = hf.h_id
    WHERE hf.h_features LIKE '%$query%'";

    $result = mysqli_query($conn, $stmt);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["Hotel Name"]. "</td></tr> <br>";
        }
    }
    mysqli_close($conn);
}
?>