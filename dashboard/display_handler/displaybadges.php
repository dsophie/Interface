<?php

$sql = "SELECT signup1, signup2, signup3, share1, share2, share3, fol1, fol2, fol3 FROM alert WHERE idUser = '$_SESSION[id]'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error());
$row = $req->fetch_array(MYSQLI_NUM);

echo '<h2 class="subtitle_dash"> You already collected: </h2> <br />';

/* Displays the name of the badges the user already have */
if ($row[0] == 1)
{
    echo '<p> >> ROOKIE: 1 scheduled activity </p> <br />';
}
if ($row[1] == 1)
{
    echo '<p> >> ADVENTURER: 10 scheduled activities </p> <br />';
}
if ($row[2] == 1)
{
    echo '<p> >> LEGEND: 50 scheduled activities </p> <br />';
}
if ($row[3] == 1)
{
    echo '<p> >> GOOD CITIZEN: 1 share </p> <br />';
}
if ($row[4] == 1)
{
    echo '<p> >> AMAZING SUPPORTER: 10 shares </p> <br />';
}
if ($row[5] == 1)
{
    echo '<p> >> UNDERCOVER SUPERHER0: 50 shares </p> <br />';
}
if ($row[6] == 1)
{
    echo '<p> >> CURIOUS: 1 follow and 1 favorite </p> <br />';
}
if ($row[7] == 1)
{
    echo '<p> >> ENTHUSIAST: 10 follows and 10 favorites </p> <br />';
}
if ($row[8] == 1)
{
    echo '<p> >> DEDICATED: 50 follows and 50 favorites </p> <br />';
}

echo '<p> <em> Keep being active, keep helping and get rewarded! </em> </p>  ';
echo '<p>    When you have collected all the badges, you get an extra reward! </p>';
?>