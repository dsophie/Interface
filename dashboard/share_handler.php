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

/* Add points to profile if a share button is clicked */
if (isset($_GET['facebook']))
{ 
    $sql2 = "SELECT points FROM Profile WHERE idUser = '$_SESSION[id]'";
    $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());
    $points = $req2->fetch_array(MYSQLI_NUM);

    $sql3 = "UPDATE Profile SET points = '$points[0]' + 35 WHERE idUser = '$_SESSION[id]'";
    $req3 = mysqli_query($con, $sql3) or die('Error '.mysqli_error());

    //Add to count for badges
    $sql5 = "SELECT count FROM share_count WHERE idUser = '$_SESSION[id]'";
    $req5 = mysqli_query($con, $sql5) or die('Error '.mysqli_error($con));
    $answer = $req5->fetch_array(MYSQLI_NUM);

    if ($answer[0] == "")
    {
        $sq = "INSERT INTO share_count(idUser, count) VALUES('$_SESSION[id]', 1)";
        $re = mysqli_query($con, $sq) or die('Error '.mysqli_error());
    }
    else
    {
        $sq = "UPDATE share_count SET count = count + 1 WHERE idUser = '$_SESSION[id]'";
        $re = mysqli_query($con, $sq) or die('Error '.mysqli_error());
    }

    header ("Location:http://www.facebook.com/sharer/sharer.php?u=http://localhost:8888/index.php&title=Let'sVolunteer");
}
if (isset($_GET['twitter']))
{
    $sql2 = "SELECT points FROM Profile WHERE idUser = '$_SESSION[id]'";
    $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());
    $points = $req2->fetch_array(MYSQLI_NUM);

    $sql3 = "UPDATE Profile SET points = '$points[0]' + 35 WHERE idUser = '$_SESSION[id]'";
    $req3 = mysqli_query($con, $sql3) or die('Error '.mysqli_error());
    
    //Add to count for badges
    $sql5 = "SELECT count FROM share_count WHERE idUser = '$_SESSION[id]'";
    $req5 = mysqli_query($con, $sql5) or die('Error '.mysqli_error($con));
    $answer = $req5->fetch_array(MYSQLI_NUM);

    if ($answer[0] == "")
    {
        $sq = "INSERT INTO share_count(idUser, count) VALUES('$_SESSION[id]', 1)";
        $re = mysqli_query($con, $sq) or die('Error '.mysqli_error());
    }
    else
    {
        $sq = "UPDATE share_count SET count = count + 1 WHERE idUser = '$_SESSION[id]'";
        $re = mysqli_query($con, $sq) or die('Error '.mysqli_error());
    }

    header ("Location:http://twitter.com/intent/tweet?status=I'm a volunteer! Why not you? And with Let'sVolunteer it has never been so easy!");
}
if (isset($_GET['linkedin']))
{
    $sql2 = "SELECT points FROM Profile WHERE idUser = '$_SESSION[id]'";
    $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());
    $points = $req2->fetch_array(MYSQLI_NUM);

    $sql3 = "UPDATE Profile SET points = '$points[0]' + 35 WHERE idUser = '$_SESSION[id]'";
    $req3 = mysqli_query($con, $sql3) or die('Error '.mysqli_error());
    
    //Add to count for badges
    $sql5 = "SELECT count FROM share_count WHERE idUser = '$_SESSION[id]'";
    $req5 = mysqli_query($con, $sql5) or die('Error '.mysqli_error($con));
    $answer = $req5->fetch_array(MYSQLI_NUM);

    if ($answer[0] == "")
    {
        $sq = "INSERT INTO share_count(idUser, count) VALUES('$_SESSION[id]', 1)";
        $re = mysqli_query($con, $sq) or die('Error '.mysqli_error());
    }
    else
    {
        $sq = "UPDATE share_count SET count = count + 1 WHERE idUser = '$_SESSION[id]'";
        $re = mysqli_query($con, $sq) or die('Error '.mysqli_error());
    }

    header ("Location:http://www.linkedin.com/shareArticle?mini=true&source=http://localhost:8888/index.php");
}

mysqli_close($con);

?>