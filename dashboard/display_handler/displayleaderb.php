<?php
//Most XP points
$sql = "SELECT idUser, points FROM Profile ORDER BY points DESC LIMIT 3";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

$sql2 = "SELECT points FROM Profile WHERE idUser = '$_SESSION[id]'";
$req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());

$row2 = $req2->fetch_array(MYSQLI_NUM);

echo '<p> <em> You currently have '.$row2[0].' points! </em> </p>'.'<p> Keep on volunteering and you will soon see your name at the top of the leaderboard! </p>';


while ($row = $req->fetch_array(MYSQLI_NUM))
{
    $sql1 = "SELECT firstName, lastName FROM User WHERE idUser = '$row[0]'";
    $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());
    $row1 = $req1->fetch_array(MYSQLI_NUM);
    
    echo '<p> > '.$row1[0].' '.$row1[1].' - '.$row[1].' XP points'.'</p>'; 
}
?>