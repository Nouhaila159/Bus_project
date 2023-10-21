<?php
//getting id from url
include_once("config.php");
$id_bus = $_GET['id_bus'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM bus WHERE id_bus=$id_bus");
 
while($res = mysqli_fetch_array($result))
{
    $immatriculation = $res['immatriculation'];
    $ligne = $res['ligne'];
    
    $result1=mysqli_query($mysqli, "SELECT num_ligne FROM ligne WHERE id_ligne=$ligne");
    $res1=mysqli_fetch_array($result1);
    $ligne1=$res1['num_ligne'];
}
$option = '';
$sql2 = 'SELECT * FROM ligne';
$res = mysqli_query($mysqli, $sql2);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $option .= '<option  name="ligne" value ="' . $row['id_ligne'] . '" >' . $row['num_ligne'] . '</option>';
    }
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="home.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="enregBus.php">
        <table >
            <tr> 
                <td>Immatriculation:</td>
                <td><input type="text" name="immatriculation" value="<?php echo $immatriculation;?>"></td>
            </tr>
            <tr> 
            <td>numero de Ligne:</td>
               <td> <select  name="ligne"  class="form-control">
                 <option selected disabled><?php echo $ligne1;?> </option>
                        <?php echo $option  ?>
                            </select>
</td>
    
            </tr>
                <td><input type="hidden" name="id_bus" value=<?php echo $_GET['id_bus'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>