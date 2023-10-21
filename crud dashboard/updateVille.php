<?php
//getting id from url
include_once("config.php");
$id_ville = $_GET['id_ville'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM ville WHERE id_ville=$id_ville");
 
while($res = mysqli_fetch_array($result))
{
    $ville = $res['ville'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="ville.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="enreg.php">
        <table >
            <tr> 
                <td>Ville</td>
                <td><input type="text" name="ville" value="<?php echo $ville;?>"></td>
            </tr>
                <td><input type="hidden" name="id_ville" value=<?php echo $_GET['id_ville'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>