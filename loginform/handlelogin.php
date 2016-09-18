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

//Save input from form in variables
$email = $_POST['loginemail'];
$password = $_POST['loginpassword'];

//Create query that retrieves the password associated to the email entered
$sql = "SELECT password FROM User WHERE email = '$email'";

//Run the query or send an error message if problem
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

//Save to a variable the results of the query
$correctpass = $req->fetch_array(MYSQLI_NUM);

if ($correctpass[0] == NULL)
{
    header("Location:../login.php?error=1");
}
else if ($correctpass[0] == $password)
{
    $sql1 = "SELECT idUser FROM User WHERE email = '$email'";
    $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());
    $row = $req1->fetch_array(MYSQLI_NUM);

    $sql2 = "SELECT points FROM Profile WHERE idUser = '$row[0]'";
    $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());
    $points = $req2->fetch_array(MYSQLI_NUM);

    $sql3 = "UPDATE Profile SET points = '$points[0]' + 5 WHERE idUser = '$row[0]'";
    $req3 = mysqli_query($con, $sql3) or die('Error '.mysqli_error());

    header("Location:../dashboard.php?email=$email");
}
else if ($correctpass[0] != $password)
{
    header("Location:../login.php?error=2");
}

mysqli_close($con);

?>