<?php 
session_start();

//Include files that handle user info
include ("dashboard/getinfo.php");

$idOffer = $_GET['id'];
$success = 0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--       Dashboard -> Learn more page
        Purpose: Display complementary information about an offer and propose multiple actions to the user
        Called by a button in dashboard.php
        Linked files:
        getinfo.php : assemble a set of information from the database and saves some as session variables
        structure elements files (php): header and footer inclusion
        dashboard elements (php): banner with share links
        Elements of dashboard schedule and leaderboard copied from dashboard main page
        -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_struc.css">
        <link rel="stylesheet" href="style_forms.css">
        <link rel="stylesheet" href="style_responsive.css">
        <title> Dashboard | Let'sVolunteer </title>
    </head>

    <body>
        
        <!-- Include header structure and share banner to page -->
        <?php include ("elements_struc/headerdashboard.php"); ?>

        <?php include ("dashboard/share_banner.php") ?> 

        <!-- Back to dashboard button -->
        <a href="dashboard.php?email=<?php echo $_SESSION['email']?>"> <img src="pictures/previous.png" id="back" alt="back" /> </a>

        <div class="columns-container">

            <div class="left-column">

                <!-- Message succes for favorites and follows -->
                <?php

                if (isset($_GET['fav']) && $_GET['fav'] == 1)
                {
                    echo '<p style="text-decoration:underline; color:slateblue;"> Favorited! </p>';
                }
                if (isset($_GET['follow']) && $_GET['follow'] == 1)
                 {
                    echo '<p style="text-decoration:underline; color:slateblue;"> Followed! </p>';
                }

                ?>

                <div class="inside_column"> 

                    <h1 class="title_dash"> Looking for a new and exciting volunteering opportunity? </h1>

                    <!-- Prints out informations about the offer and insert image as well -->
                    <p> <?php 

                        $sql = "SELECT nameOffer, descriptOffer, nameOrganisation, locationOrganisation FROM Offer, Organisation WHERE (idOffer = '$idOffer' AND Offer.idOrganisation = Organisation.idOrganisation)";
                        $req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
                        $offer = $req->fetch_array(MYSQLI_NUM);

                        $sql1 = "SELECT picture FROM Illustration WHERE idOffer = '$idOffer'";
                        $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error($con));
                        $pic = $req1->fetch_array(MYSQLI_NUM);
                        ?>

                        <img class="offers_pic" src="<?php echo $pic[0]; ?>"/>

                        <?php
                        echo '<h2 class="subtitle_home">'.$offer[0].' by '.$offer[2].'</h2>';
                        echo '<p>Location: '.$offer[3].'</p> <br />';
                        echo '<p>Description: '.$offer[1].'</p><br />';

                        ?></p> 

                    <h1 class="title_dash"> What's the next step? </h1>

                    <p> 
                        Sign up to participate in the volunteering offer. You will be able to select a shift duration and when you want to work. Once you're done signing up, the slot will be added to your schedule:
                    </p> 

                    <form class="lm" method="get" action="dash_signup.php">
                        <input type="hidden" name="id" value="<?php echo $idOffer; ?>" />                   
                        <input type="submit" class="submit_dash" value="SIGN UP" />
                    </form>

                    <br /> 

                    <p>
                        If you're thinking "maybe later", you can favorite the opportunity and come back later to sign up:
                    </p>  

                    <br />

                    <form class="lm" method="get" action="dashboard/favorite.php">
                        <input type="hidden" name="idOffer" value="<?php echo $idOffer; ?>" />                   
                        <input type="submit" class="submit_dash" value="FAVORITE" />
                    </form>

                    <br />

                    <p> 
                        Don't forget to follow the organisation to see new opportunities first, directly on your dashboard:
                    </p>  

                    <br />

                    <form class="lm" method="get" action="dashboard/follow.php">
                        <input type="hidden" name="idOffer" value="<?php echo $idOffer; ?>" />                   
                        <input type="submit" class="submit_dash" value="FOLLOW" />
                    </form>

                    <br />

                    <p>
                        Finally, if you want to help the organisation to be known and gain XP, share this offer with your friends:
                    </p>

                    <form id="lm_share" method="get" action="../dashboard/share_handler.php" target="_blank">
                        <input type="submit" name="facebook" id="fb" value=""/>
                        <input type="submit" name="twitter" id="twitter" value=""/>
                        <input type="submit" name="linkedin" id="linkedin" value="" />       
                    </form>

                    <br />

                    <h1 class="title_dash"> Searching for similar opportunities? </h1>

                    <!-- Prints out a list of offers of the same category as the one displayed -->
                    <?php 

                    $sql0 = "SELECT idCategory FROM Offer WHERE idOffer = '$idOffer'";
                    $req0 = mysqli_query($con, $sql0) or die('Error '.mysqli_error($con));
                    $res = $req0->fetch_array(MYSQLI_NUM);

                    $sql1 = "SELECT idOffer, nameOffer, idOrganisation FROM Offer WHERE idCategory = '$res[0]' AND idOffer != '$idOffer'";
                    $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error($con));
                    $sugg = $req1->fetch_array(MYSQLI_NUM);

                    if ($sugg != "")
                    {

                        $sql2 = "SELECT nameOrganisation FROM Organisation WHERE idOrganisation = '$sugg[2]'";
                        $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error($con));
                        $org = $req2->fetch_array(MYSQLI_NUM);
                        echo '<p>'.$sugg[1].' by '.$org[0].'</p>';

                    ?>

                    <form id="related_opp" method="get" action="dash_learnmore.php"> 
                        <input type="hidden" name="id" value="<?php echo $sugg[0]; ?>" />                    
                        <input type="submit" class="submit_dash_main" value="LEARN MORE" />
                    </form> 

                    <?php

                    }

                    ?>    

                </div>

                <br />

            </div>

            <div class="right-column">

                <div class="inside_column"> <!--class="dashboard_div" id="leaderb"-->

                    <h1 class="title_dash"> Leaderboard </h1>

                    <p> Have a look at your competition for the "best volunteer" title </p>

                    <p>
                       <!-- Display leaderboard content -->
                        <?php include ("dashboard/display_handler/displayleaderb.php") ?>
                    </p>

                </div>

                <br />

                <div class="inside_column"> <!--class="dashboard_div" id="schedule"--> 

                    <h1 class="title_dash"> Schedule </h1>

                    <p> See and manage upcoming scheduled activities </p>

                    <p>
                       <!-- Display schedule content -->
                        <?php include ("dashboard/display_handler/displayschedule.php") ?>
                    </p>

                    <div class="button_dash">
                        <a href="parameters.php#fschedule"> VIEW FULL SCHEDULE </a>
                    </div>

                </div>

            </div>
        </div>

       <!-- Include footer structure to page -->
        <?php include ("elements_struc/footer.php"); ?>

    </body>
</html>
