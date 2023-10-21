<?php
//including the database connection file
include("config.php");
 
//getting id of the data from url
$id_point = $_GET['id_point'];
echo $id_point;
$sql3 = "DELETE FROM bus where ligne=(SELECT id_ligne FROM ligne where point_arrivee=
(SELECT id_point FROM point_arret where id_point='$id_point') or point_depart=
(SELECT id_point FROM point_arret where id_point='$id_point'))";
mysqli_query($mysqli, $sql3);

$sql4 = "DELETE FROM avoir where ligne=
(SELECT id_ligne FROM ligne where point_arrivee=
(SELECT id_point FROM point_arret where id_point='$id_point') or point_depart=
(SELECT id_point FROM point_arret where id_point='$id_point')) 
or point_arret=
(SELECT id_point FROM point_arret where id_point='$id_point')";
mysqli_query($mysqli, $sql4);

$sql5 = "DELETE FROM ligne where point_arrivee=
(SELECT id_point FROM point_arret where id_point='$id_point')
 or point_depart=
(SELECT id_point FROM point_arret where id_point='$id_point')";

mysqli_query($mysqli, $sql5);

$sql6 = "DELETE FROM point_arret where id_point='$id_point'";
mysqli_query($mysqli, $sql6);
/*$sql= "DELETE FROM point_arret JOIN ligne JOIN avoir JOIN bus ON  
id_point=point_depart OR id_point=point_arrivee AND
 id_point=point_arret AND id_ligne=ligne WHERE  id_point= $id_point";

mysqli_query($mysqli, $sql);
 
//deleting the row from table
 
//redirecting to the display page (index.php in our case)*/
header("Location:pointArret.php");
?>