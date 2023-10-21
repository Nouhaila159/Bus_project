<?php 

if (isset($_POST["submit"])){

    $depart = $_POST["point_arret"];
    $arret = $_POST["point_arret2"];

    $query = "SELECT * FROM ligne WHERE point_depart='$depart' AND point_arrivee='$arret';";

    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) == 1)
        header("Location: chercher.php?point_arret=$depart&point_arret2=$arret");
    
    else {
      echo "<script language='Javascript'>alert('route not found');</script>";
    
  }

}

?>