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


$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$hour = $_POST['hour'];
$number = $_POST['number'];

$idOffer = $_GET['id'];

//Retrieve idOrganisation
$sql = "SELECT idOrganisation FROM Offer WHERE idOffer = '$idOffer'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
$result = $req->fetch_array(MYSQLI_NUM);

$idOrg = $result[0];
$date = $day.'/'.$month.'/'.$year;

//Insert new Slot
$sql1 = "INSERT INTO Slot(idOrganisation, idOffer, date, hour, numberHours) VALUES('$idOrg','$idOffer', '$date', '$hour', '$number')";
$req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error($con));

//Retrive idSchedule
$sql2 = "SELECT idSchedule FROM Schedule WHERE idUser = '$_SESSION[id]'";
$req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error($con));
$sch = $req2->fetch_array(MYSQLI_NUM);
$idSchedule = $sch[0];

//Retrieve idSlot
$sql3 = "SELECT idSlot FROM Slot WHERE (idOrganisation = '$idOrg' AND idOffer = '$idOffer' AND date = '$date' AND hour = '$hour' AND numberHours = '$number')  ORDER BY idSlot DESC LIMIT 1";
$req3 = mysqli_query($con, $sql3) or die('Error '.mysqli_error($con));
$slot = $req3->fetch_array(MYSQLI_NUM);
$idSlot = $slot[0];

//Insert new contains
$sql4 = "INSERT INTO contains(idSchedule, idSlot) VALUES('$idSchedule', '$idSlot')";
$req4 = mysqli_query($con, $sql4) or die('Error '.mysqli_error($con));

//Points add
$sqlpt1 = "SELECT points FROM Profile WHERE idUser = '$_SESSION[id]'";
$reqpt1 = mysqli_query($con, $sqlpt1) or die('Error '.mysqli_error());
$points = $reqpt1->fetch_array(MYSQLI_NUM);

$sqlpt2 = "UPDATE Profile SET points = '$points[0]' + 40 WHERE idUser = '$_SESSION[id]'";
$reqpt2 = mysqli_query($con, $sqlpt2) or die('Error '.mysqli_error());

//Add to count for badges
$sql5 = "SELECT count FROM signup_count WHERE idUser = '$_SESSION[id]'";
$req5 = mysqli_query($con, $sql5) or die('Error '.mysqli_error($con));
$answer = $req5->fetch_array(MYSQLI_NUM);

if ($answer[0] == "")
{
    $sq = "INSERT INTO signup_count(idUser, count) VALUES('$_SESSION[id]', 1)";
    $re = mysqli_query($con, $sq) or die('Error '.mysqli_error());
}
else
{
    $sq = "UPDATE signup_count SET count = count + 1 WHERE idUser = '$_SESSION[id]'";
    $re = mysqli_query($con, $sq) or die('Error '.mysqli_error());
}

header("Location:../../dash_signup.php?id=$idOffer&success=1");

?>