<?php

ini_set('display_errors', 1); //Displays textual explanations of errors

//Connection to mysql
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

echo '<div style="border: 1px solid gainsboro; text-align:center; padding: 10px">';

$idUser = $_GET['idUser'];

//Retrieve the user preferences
$sql0 = "SELECT idCategory1, idCategory2, idCategory3, idCategory4, idCategory5, allSelected, timeCommit, typeChoice FROM Preferences WHERE idUser = '$idUser'";
$req0 = mysqli_query($con, $sql0) or die('Error '.mysqli_error($con));   
$result = $req0->fetch_array(MYSQLI_NUM);

$idcat1 = $result[0];
$idcat2 = $result[1];
$idcat3 = $result[2];
$idcat4 = $result[3];
$idcat5 = $result[4];
$all = $result[5];
$time = $result[6];
$type = $result[7];


//Select offers based on the user preferences
if ($all == 'on')
{
    if ($type == 'no pref')
    {
        $sql = "SELECT idOffer FROM Offer LIMIT 5";
        $req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
    }
    else
    {
        $sql = "SELECT idOffer FROM Offer WHERE typeOffer = '$type' LIMIT 5";
        $req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
    }
}

if ($all != 'on')
{
    if ($type == 'no pref')
    {
        $sql = "SELECT idOffer FROM Offer WHERE (idCategory = '$idcat1' OR idCategory = '$idcat2' OR idCategory = '$idcat3' OR idCategory = '$idcat4' OR idCategory = '$idcat5') LIMIT 5";
        $req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
    }
    else
    {
        $sql = "SELECT idOffer FROM Offer WHERE typeOffer = '$type' (idCategory = '$idcat1' OR idCategory = '$idcat2' OR idCategory = '$idcat3' OR idCategory = '$idcat4' OR idCategory = '$idcat5') LIMIT 5";
        $req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
    }
}

//Display the offers with a favorite button next to each one
while($offers = $req->fetch_array(MYSQLI_NUM)) 
{


    if (isset($offers)) //If the query found results prints the data with special styling
    {
        $sql1 = "SELECT nameOffer, idOrganisation FROM Offer WHERE idOffer = '$offers[0]' LIMIT 0,10";
        $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());    
        $off = mysqli_fetch_array($req1);


        $sql2 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = '$off[1]'";
        $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());    
        $org = mysqli_fetch_array($req2);

        echo '<em> <p style="text-align:center;" id="reg">';
        echo $off[0].'</em> by '.$org[0].' @ '.$org[1];
        echo '</p>';
?>
<form method="get" action="regform/favorite.php">
    <input type="hidden" name="idOffer" value="<?php echo $offers[0]; ?>" />
    <input type="hidden" name="idUser" value="<?php echo $idUser; ?>" />                   
    <input type="submit" class="submit_dash" value="FAVORITE"/>
</form>
<br />

<?php
    } 
} 

echo '</div>';

mysqli_close($con); //Close the SQL connection

?>
