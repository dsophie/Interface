<?php

session_start();

ini_set('display_errors', 1);

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


$motivation = $_POST['motivation'];

if (isset($_POST['admin']))
{
    $admin = $_POST['admin'];
}
else
{
    $admin = null;
}

if (isset($_POST['animal']))
{
    $anim = $_POST['animal'];
}
else
{
    $anim = null;
}

if (isset($_POST['arts']))
{
    $arts = $_POST['arts'];
}
else
{
    $arts = null;
}

if (isset($_POST['caring']))
{
    $caring = $_POST['caring'];
}
else
{
    $caring = null;
}

if (isset($_POST['child']))
{
    $child = $_POST['child'];
}
else
{
    $child = null;
}

if (isset($_POST['cooking']))
{
    $cooking = $_POST['cooking'];
}
else
{
    $cooking = null;
}

if (isset($_POST['mentoring']))
{
    $mentoring = $_POST['mentoring'];
}
else
{
    $mentoring = null;
}

if (isset($_POST['envir']))
{
    $env = $_POST['envir'];
}
else
{
    $env = null;
}

if (isset($_POST['youths']))
{
    $youth = $_POST['youths'];
}
else
{
    $youth = null;
}

if (isset($_POST['allS']))
{
    $all = $_POST['allS'];
    if ($all != "on")
    {
    $all = "off";
    }
}
else
{
    $all = null;
}

$time = $_POST['time'];
$type = $_POST['type']; 

$categories = array(
    '1' => $admin,
    '2' => $anim,
    '3' => $arts,
    '4' => $caring,
    '5' => $child,
    '6' => $cooking,
    '7' => $mentoring,
    '8' => $env,
    '9' => $youth,
);

$idcat1 = 0;
$idcat2 = 0;
$idcat3 = 0;
$idcat4 = 0;
$idcat5 = 0;

//Creation of idcategories variables
$nb = 1;

for($i = 1; $i < 10; $i++)
{
    if ($categories[$i] == "on") 
    {
        ${"idcat$nb"} = $i;
        $nb++;
    }
};

//Insert User
$sql = "INSERT INTO User(firstName, lastName, email, password, dateBirth, telephone, country, city, postcode, address) VALUES('$_SESSION[firstname]', '$_SESSION[lastname]', '$_SESSION[email]', '$_SESSION[password]', '$_SESSION[datebirth]', '$_SESSION[telephone]', '$_SESSION[country]', '$_SESSION[city]', '$_SESSION[postcode]', '$_SESSION[address]')";
$req = mysqli_query($con, $sql) or die ('Error '.mysqli_error($con));

//Retrieve idUser
$idsql = "SELECT idUser FROM User WHERE email = '$_SESSION[email]'";
$idreq= mysqli_query($con, $idsql) or die ('Error '.mysqli_error($con));
$result = $idreq->fetch_array(MYSQLI_NUM);
$idUser = $result[0];

//Insert Preferences
$sql1 = "INSERT INTO Preferences(idUser, motivationChoice, idCategory1, idCategory2, idCategory3, idCategory4, idCategory5, allSelected, timeCommit, typeChoice) VALUES('$idUser', '$motivation', '$idcat1', '$idcat2', '$idcat3', '$idcat4', '$idcat5', '$all', '$time', '$type')";
$req1 = mysqli_query($con, $sql1) or die ('Error '.mysqli_error($con));

//Insert Schedule
$sql2 = "INSERT INTO Schedule(idUser) VALUES('$idUser')";
$req2 = mysqli_query($con, $sql2) or die ('Error '.mysqli_error($con));

//Retrieve idSchedule
$schsql = "SELECT idSchedule FROM Schedule WHERE idUser = '$idUser'";
$schreq= mysqli_query($con, $schsql) or die ('Error '.mysqli_error($con));
$resultsch = $schreq->fetch_array(MYSQLI_NUM);
$idSchedule = $resultsch[0];

//Insert Profile
$sql3 = "INSERT INTO Profile(idUser, idSchedule, points, idLevel) VALUES('$idUser', '$idSchedule', 25, 1)";
$req3 = mysqli_query($con, $sql3) or die ('Error '.mysqli_error($con));

mysqli_close($con);
session_destroy();

header("Location:../register_process.php?idUser=$idUser"); //redirect user to next page
?>