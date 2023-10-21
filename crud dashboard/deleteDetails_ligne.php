<?php
//including the database connection file
 include("config.php");
 
$num_ligne=$_GET['num_ligne'];
$nom_point=$_GET['nom_point'];
$horaire=$_GET['heure'];
$sql5 = "DELETE FROM avoir where ligne=(SELECT id_ligne FROM ligne where num_ligne='$num_ligne')
   and point_arret= (SELECT id_point FROM point_arret where nom_point='$nom_point') and horaire=
    (SELECT id_heure FROM horaire where heure='$horaire')";
$execute = mysqli_query($mysqli, $sql5);
if($execute){
    echo "good ";
    header("Location:details_ligne.php");
}else{
    echo "execution failed";
}


?>





