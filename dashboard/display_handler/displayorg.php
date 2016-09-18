<?php

$sql = "SELECT idUser, idOrganisation FROM follows WHERE idUser ='$_SESSION[id]'";

$req = mysqli_query($con, $sql) or die('Error '.mysqli_error());


/* Prints out the organisation name and location with buttons to see opportunities or unfollow */
while($row = $req->fetch_array(MYSQLI_NUM)) 
{
    $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[1]";
    $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

    $org = $req1->fetch_array(MYSQLI_NUM);

    echo '<label class="orgs_display">'.$org[0].' @'.$org[1].' </label>';
?>
    <form method="get" action="org_profile.php"> 
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" />
        <input type="hidden" name="idOrg" value="<?php echo $row[1]; ?>" />                    
        <input type="submit" class="submit_dash_main" value="SEE ALL OPPORTUNITIES" />
    </form> 
    
     <form method="get" action="../dashboard/unfollow.php"> 
        <input type="hidden" name="idOrg" value="<?php echo $row[1]; ?>"/>                    
        <input type="submit" class="submit_dash_main" value="UNFOLLOW"/>
    </form> 
    
    <br />
    
    <?php
    }
?>