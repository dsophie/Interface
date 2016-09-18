<?php

ini_set('display_errors', 1); //Display textual information of errors

//Mysql connection setup
$user = 'root';
$password = 'root';
$db = 'volunteer';
$host = 'localhost';
$port = 3306;

$con = mysqli_init();
$success = mysqli_real_connect(
    $con, 
    $host, 
    $user, 
    $password, 
    $db,
    $port
);

$sq = "SELECT * FROM Slot WHERE idSlot = '$_GET[idSlot]'";
$re= mysqli_query($con, $sq) or die('Error '.mysqli_error($con));
$res = $re->fetch_array(MYSQLI_NUM);

/* If slot exists, delete it */
if ($res[0] != "")
{    
    $sql = "DELETE FROM Slot WHERE idSlot = '$_GET[idSlot]'";
    $req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
    
    $sql1 = "DELETE FROM contains WHERE idSlot = '$_GET[idSlot]'";
    $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error($con));
}

header("Location:../../parameters.php#fschedule?success=3");

?>