<?php
//including the database connection file
include("config.php");
 
//getting id of the data from url
$id_ville = $_GET['id_ville'];
echo $id_ville;
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM ville WHERE id_ville=$id_ville");
 
//redirecting to the display page (index.php in our case)
header("Location:ville.php");
?>