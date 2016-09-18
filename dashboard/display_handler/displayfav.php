<?php

$sql = "SELECT * FROM favorites WHERE idUser = '$_SESSION[id]'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

/* Displays offers info and buttons to learn more or unfavorite */
while ($row = $req->fetch_array(MYSQLI_NUM))
{
    $idOffer = $row[2];
    $sql1 = "SELECT nameOffer, idOrganisation FROM Offer WHERE idOffer = '$idOffer'";
    $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());
    $row1 = $req1->fetch_array(MYSQLI_NUM);

    $nameOffer = $row1[0];
    $idOrg = $row1[1];

    $sql2 = "SELECT nameOrganisation FROM Organisation WHERE idOrganisation = '$idOrg'";
    $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());
    $row2 = $req2->fetch_array(MYSQLI_NUM);

    $nameOrg = $row2[0];

    echo '<p style="width: 350px;"> <em>'.$nameOffer.'</em>  by '.$nameOrg.'</p>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $idOffer; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dashboard/unfavorite.php"> 
    <input type="hidden" name="id" value="<?php echo $idOffer; ?>" />                    
    <input type="submit" class="submit_dash_main" value="UNFAVORITE" />
</form>
<br />
<?php
}

?>