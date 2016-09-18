<?php 
session_start();

include ("dashboard/getinfo.php");

/* 
if (isset($_GET['success']) && $_GET['success'] == 1)
{
    $msg = 'Password updated!';
}
*/
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

        <title> Parameters | Let'sVolunteer </title>
    </head>

    <body>

        <!-- Include header structure -->
        <?php include ("elements_struc/headerdashboard.php"); ?>

        <a href="dashboard.php?email=<?php echo $_SESSION['email']?>"> <img src="pictures/previous.png" id="back" alt="back" /> </a>

         <!-- Include share banner structure -->
        <?php include ("dashboard/share_banner.php") ?> 


        <div class="columns-container">

            <div class="left-column">

               <!-- Send error or sucess messages for parameters actions -->
                <?php  
                    if (isset($_GET['success']) && $_GET['success'] == 0)
                    {
                        echo '<p style="text-decoration:underline; color:slateblue;"> Error: Incorrect current password entered </p>';
                    }
                   if (isset($_GET['success']) && $_GET['success'] == 4)
                   {
                       echo '<p style="text-decoration:underline; color:slateblue;"> Error: The two new passwords entered don\'t match </p>';
                   }
                   if (isset($_GET['success']) && $_GET['success'] == 1)
                   {
                       echo '<p style="text-decoration:underline; color:slateblue;"> Password updated! </p>';
                   }

                   if (isset($_GET['success']) && $_GET['success'] == 2)
                   {
                       echo '<p style="text-decoration:underline; color:slateblue;"> Slot updated! </p>';
                   }
                   if (isset($_GET['success']) && $_GET['success'] == 3)
                   {
                       echo '<p style="text-decoration:underline; color:slateblue;"> Slot deleted! </p>';
                   }        
                ?>

                <div class="inside_column">

                    <h1 class="title_dash" id="profile"> Profile </h1>

                    <?php include ("dashboard/parameters_handler/profile.php"); ?>

                </div>    

                <br />

                <div class="inside_column">

                    <h1 class="title_dash" id="favorites"> Favorites </h1>

                    <h2 class="subtitle_dash"> Have a look at the offers you previously favorited and click on "Learn more" to read the offer and sign up</h2>

                    <?php include ("dashboard/display_handler/displayfav.php");?>

                </div>

                <br />

                <div class="inside_column">

                    <h1 class="title_dash" id="fschedule"> Schedule </h1>

                    <?php include ("dashboard/display_handler/displayfullsch.php");?>

                </div>  

                <br />

                <div class="inside_column">

                    <h1 class="title_dash" id="badges"> Badges </h1>

                    <h2 class="subtitle_dash"> On Let'sVolunteer, you can currently collect up to 9 badges! Why not try to collect them all?</p>

                    <div class="col_r"> 
                        <img src="pictures/badges/sign1.png" alt="badge" height="80" width="60" >
                        <p>  ROOKIE: 1 scheduled activity  </p>
                    </div>    
                    <div class="col_r"> 
                        <img src="pictures/badges/sign2.png" alt="badge" height="80" width="60" >
                        <p>  ADVENTURER: 10 scheduled activities  </p>
                    </div>

                    <div class="col_r"> 
                        <img src="pictures/badges/sign3.png" alt="badge" height="80" width="60" >
                        <p>  LEGEND: 50 scheduled activities  </p>
                    </div>

                    <div class="col_r"> 
                        <img src="pictures/badges/share1.png" alt="badge" height="80" width="60" >
                        <p>  GOOD CITIZEN: 1 share  </p>
                    </div>

                    <div class="col_r"> 
                        <img src="pictures/badges/share2.png" alt="badge" height="80" width="60" >
                        <p>  AMAZING SUPPORTER: 10 shares </p>
                    </div>

                    <div class="col_r"> 
                        <img src="pictures/badges/share3.png" alt="badge" height="80" width="60" >
                        <p>  UNDERCOVER SUPERHER0: 50 shares  </p>
                    </div>

                    <div class="col_r"> 
                        <img src="pictures/badges/fol1.png" alt="badge" height="80" width="60" >
                        <p>  CURIOUS: 1 follow and 1 favorite </p>
                    </div>

                    <div class="col_r"> 
                        <img src="pictures/badges/fol2.png" alt="badge" height="80" width="60" >
                        <p>  ENTHUSIAST: 10 follows and 10 favorites </p>
                    </div>

                    <div class="col_r"> 
                        <img src="pictures/badges/fol3.png" alt="badge" height="80" width="60" >
                        <p>  DEDICATED: 50 follows and 50 favorites  </p>
                    </div>
                <br />
               <?php include("dashboard/display_handler/displaybadges.php"); ?>
               
                </div>  

            </div>
            
            <div class="right-column">


            </div>

        </div>
         <!-- Include footer structure -->
        <?php include ("elements_struc/footer.php"); ?>

    </body>
</html>
