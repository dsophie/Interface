<?php 
session_start();
$_SESSION['email'] = $_GET['email'];

include ("dashboard/getinfo.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <!-- Dashboard 
       Main page of user account
        -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_struc.css">
        <link rel="stylesheet" href="style_forms.css">
        <link rel="stylesheet" href="style_responsive.css">
        <!-- Links to use sweetaler -->
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
        <title> Dashboard | Let'sVolunteer </title>
    </head>

    <body>

        <!-- Include header structure -->
        <?php include ("elements_struc/headerdashboard.php"); ?>

        <!-- File that checks if any badge was won, and if yes displays an alert -->
        <?php include ("dashboard/check_badges.php"); ?>
       
        <!-- Include share banner structure -->
        <?php include ("dashboard/share_banner.php") ?> 

        <br />

       <!-- File that checks if there is an upcoming activity and if yes display reminder -->
        <?php include ("dashboard/reminder.php"); ?>

        <div class="columns-container">

            <div class="left-column">

                <div class="inside_column"> 

                    <h1 class="title_dash"> Looking for a new and exciting volunteering opportunity? </h1>

                   <h2 class="subtitle_dash"> You will find below a couple of personnalised offers based on preferences: </h2> <br/>
                   
                    <p>
                        <?php include ("dashboard/display_handler/displayoffers.php") ?>
                    </p>

                    <h2 class="subtitle_dash"> If you want to discover new types or categories of offers, browse our entire database: </h2>

                    <div class="button_dash">
                        <a href="view_all_opp.php?email=<?php echo $_SESSION['email'];?>"> All opportunities </a>
                    </div>

                </div>

                <br />

                <div class="inside_column"> 
                   
                    <h1 class="title_dash"> Wondering what the organisations you like are up to? </h1>

                   <h2 class="subtitle_dash"> You can easily access the organisations you followed from here:</h2> <br/>
                   
                    <p class="include_p">
                        <?php include ("dashboard/display_handler/displayorg.php") ?>
                    </p>

                    <h2 class="subtitle_dash"> If you want to discover new organisations that do good for the community, you can browse through all the organisations registered with us: </h2>

                    <div class="button_dash">
                        <a href="view_all_org.php?email=<?php echo $_SESSION['email']?>"> All organisations </a>
                    </div>

                </div>

            </div>

            <div class="right-column">

                <div class="inside_column"> 
                   
                    <h1 class="title_dash"> Leaderboard </h1>

                    <h2 class="subtitle_dash"> Have a look at your competition for the "best volunteer" title </h2>

                    <p>
                       <!-- Include learderboard content -->
                        <?php include ("dashboard/display_handler/displayleaderb.php") ?>
                    </p>

                </div>

                <br />

                <div class="inside_column"> 

                    <h1 class="title_dash"> Schedule </h1>

                    <h2 class="subtitle_dash"> See and manage upcoming scheduled activities </h2>

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
