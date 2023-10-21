<?php
//getting id from url
include_once("config.php");
$id_heure = $_GET['id_heure'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM horaire WHERE id_heure=$id_heure");
 
while($res = mysqli_fetch_array($result))
{
    $heure = $res['heure'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="heure.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="enregHeure.php">
        <table >
            <tr> 
                <td>Heure</td>
                <td><input type="time" name="heure" value="<?php echo $heure;?>"></td>
            </tr>
                <td><input type="hidden" name="id_heure" value=<?php echo $_GET['id_heure'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>