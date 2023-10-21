<?php
// including the database connection file
include_once("config.php");
$id_heure = $_POST['id_heure'];
$heure = $_POST['heure'];

        //updating the table
        $result = mysqli_query($mysqli, "UPDATE horaire SET
         heure='$heure'  WHERE id_heure=$id_heure");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: heure.php");
    

?>