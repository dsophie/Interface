<?php
session_start();

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

//Delete entry from table
$sql = "DELETE FROM follows WHERE idOrganisation = '$_GET[idOrg]' AND idUser = '$_SESSION[id]'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));

header("Location:../view_all_org.php?email=$_SESSION[email]");
