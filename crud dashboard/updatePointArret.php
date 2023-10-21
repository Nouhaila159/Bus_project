<?php
//getting id from url
include_once("config.php");
$id_point = $_GET['id_point'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM point_arret WHERE id_point=$id_point");
 
while($res = mysqli_fetch_array($result))
{
    $nom_point = $res['nom_point'];
}

?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="pointArret.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="enregPointArret.php">
        <table >
        
            <tr> 
                <td>Nom point:</td>
                <td><input type="text" name="nom_point" value="<?php echo $nom_point;?>"></td>
            </tr>
            
                <td><input type="hidden" name="id_point" value=<?php echo $_GET['id_point'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>