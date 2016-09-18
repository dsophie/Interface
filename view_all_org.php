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

       <!-- Back to dashboard link -->
        <a href="dashboard.php?email=<?php echo $_SESSION['email']?>"> <img src="pictures/previous.png" id="back" alt="back" /> </a>

        <div class="columns-container">

            <div class="left-column">

              <!-- Displays success message if followed -->
               <?php
                if (isset($_GET['follow']) && $_GET['follow'] == 1)
                 {
                    echo '<p style="text-decoration:underline; color:slateblue;"> Followed! </p>';
                }
               ?>
                <div class="inside_column">
                    <h1 class="title_dash"> All organisations </h1>

                   <!-- Displays all organisations -->
                    <?php 

                    $sql = "SELECT * FROM Organisation ORDER BY nameOrganisation";
                    $req = mysqli_query($con, $sql) or die('Error '.mysqli_error());

                    while($row = $req->fetch_array(MYSQLI_NUM))
                    {
                        echo '<p>';
                        echo '<em> Name: </em>'.$row[1].'<br />';
                        echo '<em> Location: </em>'.$row[2].'<br />';
                        echo '<em> Description: </em>'.$row[3].'<br />';
                        echo '</p>';

                                ?>

                                <br />
                                <form method="get" action="org_profile.php"> 
                                    <input type="hidden" name="email" value="<? echo $_SESSION['email']; ?>" /> 
                                    <input type="hidden" name="idOrg" value="<?php echo $row[0]; ?>" />  
                                    <input type="submit" class="submit_dash_main" value="SEE OPPORTUNITIES" />
                                </form>
                                <?php 
                                $sql1 = "SELECT idFollow FROM follows WHERE idUser = '$_SESSION[id]' AND idOrganisation = '$row[0]'";
                                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());
                                $row1 = $req1->fetch_array(MYSQLI_NUM);

                                if ($row1[0] == "") 
                                {
                                    ?>

                                    <form method="get" action="dashboard/follow.php"> 
                                    <input type="hidden" name="idOrg" value="<?php echo $row[0]; ?>"/>  
                                    <input type="submit" class="submit_dash_main" value="FOLLOW" />
                                    </form>

                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form method="get" action="dashboard/unfollow.php"> 
                                    <input type="hidden" name="idOrg" value="<?php echo $row[0]; ?>"/>  
                                    <input type="submit" class="submit_dash_main" value="UNFOLLOW" />
                                    </form>
                                <?php
                                }

                            echo '<br />';
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
