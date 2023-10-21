<?php
session_start();
    extract($_POST);
    include 'config.php';
    echo $pass_chif;
    $sql=mysqli_query($mysqli,"SELECT * FROM admin where email='$email' and password='$password'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"]=$row['username'];
        header("Location: home.php"); 
    }
    else
    {
		 header("Location: login.php?err=1"); 
        echo "Invalid Email ID/Password";
    }

?>