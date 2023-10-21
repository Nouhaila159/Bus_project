<?php
// including the database connection file
include_once("config.php");
$id_ville = $_POST['id_ville'];
$ville = $_POST['ville'];

        //updating the table
        $result = mysqli_query($mysqli, "UPDATE ville SET
         ville='$ville'  WHERE id_ville=$id_ville");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: ville.php");
    

?>