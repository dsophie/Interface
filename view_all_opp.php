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

        <title> Dashboard | Let'sVolunteer </title>
    </head>

    <body>

        <!-- Include header structure -->
        <?php include ("elements_struc/headerdashboard.php"); ?>

        <!-- Include share banner structure -->
        <?php include ("dashboard/share_banner.php") ?> 

        <!-- Back to dashboard button -->
        <a href="dashboard.php?email=<?php echo $_SESSION['email']?>"> <img src="pictures/previous.png" id="back" alt="back" /> </a>

        <div class="columns-container">

            <div class="left-column">

                <div class="inside_column"> 
                   
                    <h1 class="title_dash"> All opportunities </h1>

                    <!-- Prints out all offers -->
                    <?php 

                        $sql = "SELECT * FROM Offer ORDER BY idOffer DESC";
                        $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

                        while($row = $req->fetch_array(MYSQLI_NUM))
                        {
                            $sql1 = "SELECT nameOrganisation, locationOrganisation FROM Organisation WHERE idOrganisation = '$row[2]'";
                            $req1 =  mysqli_query($con, $sql1) or die('Error '.mysqli_error());
                            $row1 = $req1->fetch_array(MYSQLI_NUM);

                            $nameOrg = $row1[0];
                            $locationOrg = $row1[1];

                            echo '<p>';
                            echo $row[1].' by '.$nameOrg.' @'.$locationOrg.'<br />';
                            echo 'Description : '.$row[3];
                            echo '</p>';

                                    ?>
                            <br />
                                <form method="get" action="dash_learnmore.php"> 
                                    <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />  
                                    <input type="submit" class="submit_dash_main" value="LEARN MORE" />
                                </form> 
                            <br />
                            <?php
                        }
                    ?>

            </div>

        </div>

        <div class="right-column">

            <div class="inside_column"> 

                <h1 class="title_dash"> Leaderboards </h1>

                <p> Have a look at your competition for the "best volunteer" title </p>

                <p>
                    <!-- Include leaderboard content -->
                    <?php include ("dashboard/display_handler/displayleaderb.php") ?>
                </p>

            </div>

            <br />

            <div class="inside_column"> 

                <h1 class="title_dash"> Schedule </h1>

                <p> See and manage upcoming scheduled activities </p>

                <p>
                    <!-- Include schedule content -->
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
