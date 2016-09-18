<?php 
session_start();

include ("dashboard/getinfo.php");

$idOffer = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--       Dashboard -> Sign up page
        Purpose: Display sign up form for a specific offer
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
        <!-- Link to validation document for form -->
        <script type="text/javascript" src="dashboard/signup_handler/validate_signup.js"></script>
        <!-- Links to use sweetalert -->
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
        <title> Dashboard | Let'sVolunteer </title>
    </head>

    <body>

       <!-- Include header structure -->
        <?php include ("elements_struc/headerdashboard.php"); ?>

        <?php include ("dashboard/share_banner.php") ?> 

        <!-- Link for back to dashboard button -->
        <a href="dashboard.php?email=<?php echo $_SESSION['email']?>"> <img src="pictures/previous.png" id="back" alt="back" /> </a>

        <div class="columns-container">

            <div class="left-column">
                
                <!-- Send an alert when a slot was scheduled succesfully -->
                <?php
                    if (isset($_GET['success']) && $_GET['success'] == 1)
                    {?>
                    <script> swal("Slot scheduled!", "You can find all your scheduled activities in your schedule", "success"); </script> <?php
                    } 
                    ?>

                <div class="inside_column"> <!-- id="offers" class="dashboard_div"--> 

                    <h1 class="title_dash"> Ready to sign up? </h1>

                    <p id='targetsign'> 
                    </p>

                   <!-- Prints ou the main information about the offer -->
                    <?php 

                        $sql = "SELECT nameOffer, descriptOffer, nameOrganisation, locationOrganisation FROM Offer, Organisation WHERE (idOffer = '$idOffer' AND Offer.idOrganisation = Organisation.idOrganisation)";
                        $req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
                        $offer = $req->fetch_array(MYSQLI_NUM);

                        echo '<h2 class="subtitle_home">'.$offer[0].' by '.$offer[2].'</h2>';

                        echo '<p> <em> Description: </em>'.$offer[1];

                    ?>

                    <p> How does it work? Nothing easier, select how many hours you want to schedule for this activity, select your slots and submit!</p>    

                   <!-- Sign up form -->
                    <?php

                    $sql = "SELECT timeRequired FROM Offer WHERE idOffer = '$idOffer'";
                    $req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
                    $result = $req->fetch_array(MYSQLI_NUM);

                    $timeR = $result[0];
                    $ch1 = $timeR + 4;
                    $ch2 = $timeR + 2;
                    $ch3 = $timeR;
                    ?>

                    <form id="signup" onsubmit="return check();" method="post" action="dashboard/signup_handler/signup.php?id=<?php echo $idOffer?>">             
                        <p id="Q1"> 1. How many hours do you want to schedule? </p>

                        <label class="signup_label"> <?php echo $ch1;?> </label>
                        <input class="radio" type="radio" value="<?php echo $ch1;?>" name="hours"/> 
                        <label class="signup_label"> <?php echo $ch2;?> </label>
                        <input class="radio" type="radio" value="<?php echo $ch2;?>" name="hours"/>
                        <label class="signup_label"> <?php echo $ch3;?> </label>
                        <input class="radio" type="radio" value="<?php echo $ch3;?>" name="hours"/>


                        <p> 2. Slots sign up: Select the time slot where you want to help, don't worry you won't have to remember them as you can see them in your schedule</p>

                        <div>
                            <label> Date (Day Month Year): </label>
                            <input type="text" name="day" class="date"/>
                            <input type="text" name="month" class="date"/>
                            <input type="text" name="year" class="date"/> <br />

                            <label> Beginning hour: </label>
                            <select name="hour">
                                <option> Select hour </option>
                                <option> 01:00 </option>
                                <option> 02:00 </option>
                                <option> 03:00 </option>
                                <option> 04:00 </option>
                                <option> 05:00 </option>
                                <option> 06:00 </option>
                                <option> 07:00 </option>
                                <option> 08:00 </option>
                                <option> 09:00 </option>
                                <option> 10:00 </option>
                                <option> 11:00 </option>
                                <option> 12:00 </option>
                                <option> 13:00 </option>
                                <option> 14:00 </option>
                                <option> 15:00 </option>
                                <option> 16:00 </option>
                                <option> 17:00 </option>
                                <option> 18:00 </option>
                                <option> 19:00 </option>
                                <option> 20:00 </option>
                                <option> 21:00 </option>
                                <option> 22:00 </option>
                                <option> 23:00 </option>
                                <option> 24:00 </option>
                            </select>
                            <br />

                            <label> Numbers of hours to schedule: </label>
                            <?php 
                            echo '<select name="number">';        
                            for ($i=1 ;$i <= (int)$ch1; $i++)
                            {
                                echo '<option>'.$i.'</option>';
                            }
                            echo '</select>';
                            ?>
                            <br />
                            <input class="submit_dash" type="submit" value="CONFIRM" />

                        </div> 

                    </form>

                </div>

            </div>

            <div class="right-column">

                <div class="inside_column"> 

                    <h1 class="title_dash"> Leaderboard </h1>

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
