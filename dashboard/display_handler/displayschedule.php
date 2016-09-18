<?php
//Retrieve idSchedule of user
$sql = "SELECT idSchedule FROM Schedule WHERE idUser ='$_SESSION[id]'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error());
$row = $req->fetch_array(MYSQLI_NUM);
$idSchedule = $row[0];

//Retrieve all Slots in user's schedule
$sql1 = "SELECT idSlot FROM contains WHERE idSchedule = '$idSchedule' ORDER BY idContains LIMIT 3";
$req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

while ($row1 = $req1->fetch_array(MYSQLI_NUM))
{
    //Retrieve information from Slot
    $sql2 = "SELECT idOffer, idOrganisation, date, hour, numberHours FROM Slot WHERE idSlot = '$row1[0]'";
    $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error($con));
    $result = $req2->fetch_array(MYSQLI_NUM);

    $idOffer = $result[0];
    $idOrg = $result[1];
    $date = $result[2];
    $hour = $result[3];
    $numberHours = $result[4];

    //Retrieve name of offer and organisation
    $sql3 = "SELECT nameOffer FROM Offer WHERE idOffer = '$idOffer'";
    $req3 = mysqli_query($con, $sql3) or die('Error '.mysqli_error());
    $offer = $req3->fetch_array(MYSQLI_NUM);
    $nameOffer = $offer[0];

    $sql4 = "SELECT nameOrganisation FROM Organisation WHERE idOrganisation = '$idOrg'";
    $req4 = mysqli_query($con, $sql4) or die('Error '.mysqli_error());
    $org = $req4->fetch_array(MYSQLI_NUM);
    $nameOrg = $org[0];

    //Prints out
    echo '<p>';
    echo $date.' - '.$hour;
    echo '<br />'.$nameOffer.' @'.$nameOrg; 
    echo '</p>';

?>
<form method="get" action="parameters.php#fschedule"> 
    <input type="hidden" name="idSlot" value="<?php echo $row1[0]; ?>" />                    
    <input  id="slot" class="button_dash" type="submit" value="MANAGE SLOT" />
</form> 
<?php
} 

?>