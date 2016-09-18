<?php
/* Prints offers name, organisation and location based on the user preference and add button that redirect to learn more or sign up page with id of offer as parameter
*/

if ($_SESSION['time'] == 10)
{  
    if ($_SESSION['type'] == 'no pref')
    {
        if ($_SESSION['all'] == "on")
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE timeRequired >= 1 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);
                echo '<div class="div_form">';
                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>

<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }
        else
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE (idCategory = '$_SESSION[cat1]' OR idCategory = '$_SESSION[cat2]' OR idCategory = '$_SESSION[cat3]' OR idCategory = '$_SESSION[cat4]' OR idCategory = '$_SESSION[cat5]') AND timeRequired >= 1 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

               echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>

<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }

    }
    else
    {
        if ($_SESSION['all'] == "on")
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE typeOffer = '$_SESSION[type]' AND timeRequired >= 1 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<p>'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</p>';

?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }
        else
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE typeOffer = '$_SESSION[type]' AND (idCategory = '$_SESSION[cat1]' OR idCategory = '$_SESSION[cat2]' OR idCategory = '$_SESSION[cat3]' OR idCategory = '$_SESSION[cat4]' OR idCategory = '$_SESSION[cat5]') AND timeRequired >= 1 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<p>'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</p>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" value="LEARN MORE" class="submit_dash_main" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php 
            }
        }
    }
}
if ($_SESSION['time'] == 310)
{  
    if ($_SESSION['type'] == 'no pref')
    {
        if ($_SESSION['all'] == "on")
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE (timeRequired >= 3 AND timeRequired < 10) ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }
        else
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE (idCategory = '$_SESSION[cat1]' OR idCategory = '$_SESSION[cat2]' OR idCategory = '$_SESSION[cat3]' OR idCategory = '$_SESSION[cat4]' OR idCategory = '$_SESSION[cat5]') AND (timeRequired >= 3 AND timeRequired < 10) ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }
    }
    else
    {
        if ($_SESSION['all'] == "on")
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE typeOffer = '$_SESSION[type]' AND (idCategory = 1 OR idCategory = 2 OR idCategory = 3 OR idCategory = 4 OR idCategory = 5 OR idCategory = 6 OR idCategory = 7 OR idCategory = 8 OR idCategory = 9) AND (timeRequired >= 3 AND timeRequired < 10) ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<p>'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</p>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }
        else
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE typeOffer = '$_SESSION[type]' AND (idCategory = '$_SESSION[cat1]' OR idCategory = '$_SESSION[cat2]' OR idCategory = '$_SESSION[cat3]' OR idCategory = '$_SESSION[cat4]' OR idCategory = '$_SESSION[cat5]') AND (timeRequired >= 3 AND timeRequired < 10) ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<p>'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</p>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" value="SIGN UP" class="submit_dash_main" />
</form>

<br />

<?php
            }
        }
    }
}
if ($_SESSION['time'] == 3) //ok
{  
    if ($_SESSION['type'] == 'no pref')
    {
        if ($_SESSION['all'] == "on") //ok
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE (idCategory = 1 OR idCategory = 2 OR idCategory = 3 OR idCategory = 4 OR idCategory = 5 OR idCategory = 6 OR idCategory = 7 OR idCategory = 8 OR idCategory = 9) AND timeRequired < 3 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit"  class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }
        else //ok
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE (idCategory = '$_SESSION[cat1]' OR idCategory = '$_SESSION[cat2]' OR idCategory = '$_SESSION[cat3]' OR idCategory = '$_SESSION[cat4]' OR idCategory = '$_SESSION[cat5]') AND timeRequired < 3 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }
    }
    else //ok
    {
        if ($_SESSION['all'] == "on")
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE typeOffer = '$_SESSION[type]' AND (idCategory = 1 OR idCategory = 2 OR idCategory = 3 OR idCategory = 4 OR idCategory = 5 OR idCategory = 6 OR idCategory = 7 OR idCategory = 8 OR idCategory = 9) AND timeRequired < 3 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }
        else
        {
            $sql = "SELECT ifOffer, nameOffer, idOrganisation FROM Offer WHERE typeOffer = '$_SESSION[type]' AND (idCategory = '$_SESSION[cat1]' OR idCategory = '$_SESSION[cat2]' OR idCategory = '$_SESSION[cat3]' OR idCategory = '$_SESSION[cat4]' OR idCategory = '$_SESSION[cat5]') AND timeRequired < 3 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }

        }
    }
} 
if ($_SESSION['time'] == 0) //ok
{  
    if ($_SESSION['type'] == 'no pref') //ok
    {
        if ($_SESSION['all'] == "on")
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE timeRequired >= 0 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());
            
            while($row = $req->fetch_array(MYSQLI_NUM)) 
            {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            } 
        }
        else
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE (idCategory = '$_SESSION[cat1]' OR idCategory = '$_SESSION[cat2]' OR idCategory = '$_SESSION[cat3]' OR idCategory = '$_SESSION[cat4]' OR idCategory = '$_SESSION[cat5]') AND timeRequired >= 0 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }

   }
    else //ok
    {
        if ($_SESSION['all'] == "on")
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE typeOffer = '$_SESSION[type]' AND timeRequired >= 0 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }
        else
        {
            $sql = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE typeOffer = '$_SESSION[type]' AND (idCategory = '$_SESSION[cat1]' OR idCategory = '$_SESSION[cat2]' OR idCategory = '$_SESSION[cat3]' OR idCategory = '$_SESSION[cat4]' OR idCategory = '$_SESSION[cat5]') AND timeRequired >= 0 ORDER BY idOffer DESC LIMIT 5";

            $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

            while($row = $req->fetch_array(MYSQLI_NUM)) {
                $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = $row[2]";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                $org = $req1->fetch_array(MYSQLI_NUM);

                echo '<label class="offers_display">'.$row[1].' submitted by '.$org[0].' @'.$org[1].'</label>';
?>
<form method="get" action="dash_learnmore.php"> 
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                    
    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
</form>

<form method="get" action="dash_signup.php">
    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />                   
    <input type="submit" class="submit_dash_main" value="SIGN UP" />
</form>

<br />

<?php
            }
        }

    }

}

?>