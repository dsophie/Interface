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

$idUser = $_GET['idUser'];
$oldpass = $_GET['oldpass'];
$newpass = $_GET['newpass'];
$confpass = $_GET['confnewpass'];

$sql = "SELECT password FROM User WHERE idUser = '$idUser'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error());
$result = $req->fetch_array(MYSQLI_NUM);

/*If the old password is the same as the one in the database and if the two new passwords are equal,
change password */
if ($result[0] == $oldpass)
{
    if ($newpass == $confpass)
    {
        $sql1 = "UPDATE User SET password = '$newpass' WHERE idUser = '$idUser'";
        $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

        Header ("Location: ../parameters.php?success=1"); 
    }
    else
    {
        Header ("Location: ../parameters.php?success=4");
    }
}
else
{
    Header ("Location: ../parameters.php?success=0");
}


?>