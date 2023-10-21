<?php
//including the database connection file
include("config.php");
 
//getting id of the data from url
$id_heure = $_GET['id_heure'];
echo $id_heure;
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM horaire WHERE id_heure=$id_heure");
 
//redirecting to the display page (index.php in our case)
header("Location:heure.php");
?>