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

$idSlot = $_GET['idSlot'];

$date = $_GET['day'].'/'.$_GET['month'].'/'.$_GET['year'];
$sql1 = "UPDATE Slot SET date = '$date' WHERE idSlot = '$idSlot'";
$req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

$sql2 = "UPDATE Slot SET hour = '$_GET[hour]' WHERE idSlot = '$idSlot'";
$req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());

$sql3 = "UPDATE Slot SET numberHours = '$_GET[number]' WHERE idSlot = '$idSlot'";
$req3 = mysqli_query($con, $sql3) or die('Error '.mysqli_error());

Header ("Location: ../../parameters.php?success=2");
?>