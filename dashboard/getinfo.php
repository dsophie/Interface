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

//Retrieve User info
$sql = "SELECT firstName, lastName, idUser FROM User WHERE email = '$_SESSION[email]'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
$user = $req->fetch_array(MYSQLI_NUM);
$_SESSION['firstName'] = $user[0];
$_SESSION['lastName'] = $user[1];
$_SESSION['id'] = $user[2];

//Retrieve Preferences info
$sql1 = "SELECT * FROM Preferences WHERE idUser = '$_SESSION[id]'";
$req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());
$preferences = $req1->fetch_array(MYSQLI_NUM);
$_SESSION['motivation'] = $preferences[1];
$_SESSION['cat1'] = $preferences[2];
$_SESSION['cat2'] = $preferences[3];
$_SESSION['cat3'] = $preferences[4];
$_SESSION['cat4'] = $preferences[5];
$_SESSION['cat5'] = $preferences[6];
$_SESSION['all'] = $preferences[7];
$_SESSION['time'] = $preferences[8];
$_SESSION['type'] = $preferences[9];

//Retrive Profile info
$sql2 = "SELECT * FROM Profile WHERE idUser = '$_SESSION[id]'";
$req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());
$profile = $req2->fetch_array(MYSQLI_NUM);
$_SESSION['IdSchedule'] = $profile[1];
$_SESSION['points'] = $profile[2];
$_SESSION['level'] = $profile[3];


$sql4 = "SELECT idLevel FROM Level WHERE pointsMax >= '$_SESSION[points]'";
$req4 = mysqli_query($con, $sql4) or die('Error '.mysqli_error());
$level = $req4->fetch_array(MYSQLI_NUM);

$sql5 = "UPDATE Profile SET idLevel = '$level[0]' WHERE idUser = '$_SESSION[id]'";
$req5 = mysqli_query($con, $sql5) or die('Error '.mysqli_error());

$_SESSION['level'] = $level[0];

?>