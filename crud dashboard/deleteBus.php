<?php
//including the database connection file
include("config.php");
 
//getting id of the data from url
$id_bus = $_GET['id_bus'];
echo $id_ville;
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM bus WHERE id_bus=$id_bus");
 
//redirecting to the display page (index.php in our case)
header("Location:home.php");
?>