<?php 
session_start();
$_SESSION['email'] = $_GET['email'];

include ("dashboard/getinfo.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_struc.css">
        <link rel="stylesheet" href="style_forms.css">
        <link rel="stylesheet" href="style_responsive.css">

        <title> Organisation | Let'sVolunteer </title>
    </head>

    <body>

        <!-- Include header structure -->
        <?php include ("elements_struc/headerdashboard.php"); ?>

        <!-- Include share banner structure -->
        <?php include ("dashboard/share_banner.php") ?> 

       <!-- Link back to dashboard -->
        <a href="dashboard.php?email=<?php echo $_SESSION['email']?>"> <img src="pictures/previous.png" id="back" alt="back" /> </a>

        <div class="columns-container">

            <div class="left-column">

                <div class="inside_column">
                   
                    <h1 class="title_dash"> Organisation </h1>

                       <!-- Display organisation information and each of its offers with a learn more button -->
                        <?php

                        $idOrg = $_GET['idOrg'];
                        $sql = "SELECT * FROM Organisation WHERE idOrganisation = '$idOrg'";
                        $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());
                        $row = $req->fetch_array(MYSQLI_NUM);

                        echo '<h2 class="subtitle_dash"> Name: '.$row[1].'</h2> <br /> <br />';
                        echo '<p>';
                        echo '<em> Location: </em>'.$row[2].'<br /> <br />';
                        echo '<em> Description: </em>'.$row[3].'<br />';
                        echo '</p>';

                        $sql1 = "SELECT * FROM Offer WHERE idOrganisation = '$idOrg' ORDER BY idOffer DESC";
                        $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

                        echo '<br />';
                        while ($row1 = $req1->fetch_array(MYSQLI_NUM))
                        {
                            echo '<p>';
                            echo '<em > Offer: </em>'.$row1[1].'<br />';

                            $sql2 = "SELECT name FROM Category WHERE idCategory = '$row1[5]'";
                            $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());
                            $res = $req2->fetch_array(MYSQLI_NUM);

                            echo  '<em> Category: </em>'.$res[0].'<br />';
                            echo '<em> What the offer is about: </em>'.$row1[3];
                            echo '</p>';
                        ?>

                        <br />
                                <form method="get" action="dash_learnmore.php"> 
                                    <input type="hidden" name="id" value="<?php echo $row1[0]; ?>" />  
                                    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
                                </form>

                        <br />
                                <?php
                        }
                        ?>

            </div>

        </div>

        <div class="right-column">

            <div class="inside_column"> <!--class="dashboard_div" id="leaderb"-->

                <h1 class="title_dash"> Leaderboards </h1>

                <p> Have a look at your competition for the "best volunteer" title </p>

                <p>
                    <!-- Include leaderboard structure -->
                    <?php include ("dashboard/display_handler/displayleaderb.php") ?>
                </p>

            </div>

            <br />

            <div class="inside_column"> <!--class="dashboard_div" id="schedule"--> 

                <h1 class="title_dash"> Schedule </h1>

                <p> See and manage upcoming scheduled activities </p>

                <p>
                    <!-- Include schedule structure -->
                    <?php include ("dashboard/display_handler/displayschedule.php") ?>
                </p>

                <div class="button_dash">
                    <a href="parameters.php#fschedule"> VIEW FULL SCHEDULE </a>
                </div>

            </div>

        </div>
        </div>

    <!-- Include footer structure -->
    <?php include ("elements_struc/footer.php"); ?>

    </body>
</html>
