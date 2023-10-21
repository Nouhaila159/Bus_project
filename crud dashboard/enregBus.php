<?php
// including the database connection file
include_once("config.php");
$id_bus = $_POST['id_bus'];
$immatriculation = $_POST['immatriculation'];
$ligne = $_POST['ligne'];

        //updating the table
        $result = mysqli_query($mysqli, "UPDATE bus SET immatriculation='$immatriculation', ligne='$ligne' WHERE id_bus=$id_bus");
        if($result){
            header("Location: home.php");
        }
        //redirectig to the display page. In our case, it is index.php
        header("Location: home.php");
    

?>