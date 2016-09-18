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

$idOffer = $_GET['idOffer'];

$check = "SELECT idFav FROM favorites WHERE idOffer = '$idOffer' AND idUser = '$_SESSION[id]'";
$checkr = mysqli_query($con, $check) or die('Error '.mysqli_error($con));
$result = $checkr->fetch_array(MYSQLI_NUM);

/* If the offer is not already favorited by the user, add it */
if ($result[0] == "")
{
    $sql = "INSERT INTO favorites (idUser, idOffer) VALUES('$_SESSION[id]', '$idOffer')";
    $req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));

    //Points add//
    $sql2 = "SELECT points FROM Profile WHERE idUser = '$_SESSION[id]'";
    $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());
    $points = $req2->fetch_array(MYSQLI_NUM);

    $sql3 = "UPDATE Profile SET points = '$points[0]' + 25 WHERE idUser = '$_SESSION[id]'";
    $req3 = mysqli_query($con, $sql3) or die('Error '.mysqli_error());

    //Add to count for badges
    $sql5 = "SELECT count FROM interest_count WHERE idUser = '$_SESSION[id]'";
    $req5 = mysqli_query($con, $sql5) or die('Error '.mysqli_error($con));
    $answer = $req5->fetch_array(MYSQLI_NUM);

    if ($answer[0] == "")
    {
        $sq = "INSERT INTO interest_count(idUser, count) VALUES('$_SESSION[id]', 1)";
        $re = mysqli_query($con, $sq) or die('Error '.mysqli_error($con));
    }
    else
    {
        $sq = "UPDATE interest_count SET count = count + 1 WHERE idUser = '$_SESSION[id]'";
        $re = mysqli_query($con, $sq) or die('Error '.mysqli_error());
    }

}

header("Location:../dash_learnmore.php?id=$idOffer&fav=1");

?>