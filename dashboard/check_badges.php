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

//Retrieves how many time the user signed up
$sql = "SELECT count FROM signup_count WHERE idUser = '$_SESSION[id]'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con)); 
$row = $req->fetch_array(MYSQLI_NUM);
$signup = $row[0];

//Retrieves how many time the user shared
$sqls = "SELECT count FROM share_count WHERE idUser = '$_SESSION[id]'";
$reqs = mysqli_query($con, $sqls) or die('Error '.mysqli_error($con)); 
$rows = $reqs->fetch_array(MYSQLI_NUM);
$share = $rows[0];

//Retrieves how many time the user followed/favorited
$sqli = "SELECT count FROM interest_count WHERE idUser = '$_SESSION[id]'";
$reqi = mysqli_query($con, $sqli) or die('Error '.mysqli_error($con)); 
$rowi = $reqi->fetch_array(MYSQLI_NUM);
$interest = $rowi[0];

//Check if the user already have an entry in the alert table
$sql1 = "SELECT signup1 FROM alert WHERE idUser = '$_SESSION[id]'";
$req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error($con)); 
$row1 = $req1->fetch_array(MYSQLI_NUM);

//if no entry is found with the id of the user
if ($row1[0] == "")
{
    //Insert a new entry for the user
    $sq = "INSERT INTO alert(idUser, signup1, signup2, signup3, share1, share2, share3, fol1, fol2, fol3) VALUES ('$_SESSION[id]', 0, 0, 0, 0, 0, 0, 0, 0, 0)";
    $re = mysqli_query($con, $sq) or die('Error '.mysqli_error($con)); 
}

//Retrieves all the values of alerts of the user
//Values represent if the user as been alerted: O no 1 yes
$sql2 = "SELECT signup1, signup2, signup3, share1, share2, share3, fol1, fol2, fol3 FROM alert WHERE idUser = '$_SESSION[id]'";
$req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error($con)); 
$row2 = $req2->fetch_array(MYSQLI_NUM);


if ($signup == 1)
{ 
    //If not alerted for first sign up badge, alert and set to 1
    if  ($row2[0] == 0)
    {
?>
<script>
    swal(
        {
            title: "You just earned a new badge - ROOKIE",
            text: "First activity scheduled",
            imageUrl: "pictures/badges/sign1.png"
        });
</script>  <?php

        $s = "UPDATE alert SET signup1 = 1 WHERE idUser = '$_SESSION[id]'";  
        $r = mysqli_query($con, $s) or die('Error '.mysqli_error($con)); 
    } 
}
if ($signup == 10)
{ 
    //If not alerted for first sign up badge, alert and set to 1
    if  ($row2[1] == 0)
    {
?>
<script>
    swal(
        {
            title: "You just earned a new badge - ADVENTURER",
            text: "10th activiy scheduled",
            imageUrl: "pictures/badges/sign2.png"
        });
</script>  <?php

        $s = "UPDATE alert SET signup2 = 1 WHERE idUser = '$_SESSION[id]'";  
        $r = mysqli_query($con, $s) or die('Error '.mysqli_error($con)); 
    } 
}
if ($signup == 50)
{ 
    //If not alerted for first sign up badge, alert and set to 1
    if  ($row2[2] == 0)
    {
?>
<script>
    swal(
        {
            title: "You just earned a new badge - LEGEND",
            text: "50th activity scheduled",
            imageUrl: "pictures/badges/sign3.png"
        });
</script>  <?php

        $s = "UPDATE alert SET signup3 = 1 WHERE idUser = '$_SESSION[id]'";  
        $r = mysqli_query($con, $s) or die('Error '.mysqli_error($con)); 
    } 
}

if ($share == 1)
{ 
    //If not alerted for first sign up badge, alert and set to 1
    if  ($row2[3] == 0)
    {
?>
<script>
    swal(
        {
            title: "You just earned a new badge - GOOD CITIZEN!",
            text: "First share",
            imageUrl: "pictures/badges/share1.png"
        });
</script>  <?php

        $s = "UPDATE alert SET share1 = 1 WHERE idUser = '$_SESSION[id]'";  
        $r = mysqli_query($con, $s) or die('Error '.mysqli_error($con)); 
    } 
}
if ($share == 10)
{ 
    //If not alerted for first sign up badge, alert and set to 1
    if  ($row2[4] == 0)
    {
?>
<script>
    swal(
        {
            title: "You just earned a new badge - AMAZING SUPPORTER!",
            text: "10th share",
            imageUrl: "pictures/badges/share2.png"
        });
</script>  <?php

        $s = "UPDATE alert SET share2 = 1 WHERE idUser = '$_SESSION[id]'";  
        $r = mysqli_query($con, $s) or die('Error '.mysqli_error($con)); 
    } 
}
if ($share == 50)
{ 
    //If not alerted for first sign up badge, alert and set to 1
    if  ($row2[5] == 0)
    {
?>
<script>
    swal(
        {
            title: "You just earned a new badge - UNDERCOVER SUPERHERO",
            text: "50th share",
            imageUrl: "pictures/badges/share3.png"
        });
</script>  <?php

        $s = "UPDATE alert SET share3 = 1 WHERE idUser = '$_SESSION[id]'";  
        $r = mysqli_query($con, $s) or die('Error '.mysqli_error($con)); 
    } 
}

if ($interest == 2)
{ 
    //If not alerted for first sign up badge, alert and set to 1
    if  ($row2[6] == 0)
    {
?>
<script>
    swal(
        {
            title: "You just earned a new badge - CURIOUS",
            text: "First follow and favorite",
            imageUrl: "pictures/badges/fol1.png"
        });
</script>  <?php

        $s = "UPDATE alert SET fol1 = 1 WHERE idUser = '$_SESSION[id]'";  
        $r = mysqli_query($con, $s) or die('Error '.mysqli_error($con)); 
    } 
}
if ($interest == 20)
{ 
    //If not alerted for first sign up badge, alert and set to 1
    if  ($row2[7] == 0)
    {
?>
<script>
    swal(
        {
            title: "You just earned a new badge - ENTHUSIAST",
            text: "10th follow and favorite",
            imageUrl: "pictures/badges/fol2.png"
        });
</script>  <?php

        $s = "UPDATE alert SET fol2 = 1 WHERE idUser = '$_SESSION[id]'";  
        $r = mysqli_query($con, $s) or die('Error '.mysqli_error($con)); 
    } 
}
if ($interest == 100)
{ 
    //If not alerted for first sign up badge, alert and set to 1
    if  ($row2[8] == 0)
    {
?>
<script>
    swal(
        {
            title: "You just earned a new badge - DEDICATED",
            text: "50th follow and favorite",
            imageUrl: "pictures/badges/fol3.png"
        });
</script>  <?php

        $s = "UPDATE alert SET fol3 = 1 WHERE idUser = '$_SESSION[id]'";  
        $r = mysqli_query($con, $s) or die('Error '.mysqli_error($con)); 
    } 
}

?>