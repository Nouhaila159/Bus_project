<?php
// including the database connection file
include_once("config.php");
$id_point = $_POST['id_point'];
$nom_point = $_POST['nom_point'];

        //updating the table
        $result = mysqli_query($mysqli, "UPDATE point_arret SET
         nom_point='$nom_point' WHERE id_point=$id_point");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: pointArret.php");
    

?>