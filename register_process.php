<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_responsive.css">
        <link rel="stylesheet" href="style_struc.css">
        <link rel="stylesheet" href="style_forms.css">
        <title> Register | Let'sVolunteer </title>

        <script> //redirect after 20seconds
                setTimeout(function () {
                window.location.href = "register_complete.php"; 
                }, 20000);
        </script>

    </head>

    <body>

        <!-- Include header structure -->
        <?php include("elements_struc/header.php"); ?>

        <div class="block" id="main">

           <!-- Send success message when offer favorited -->
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 1)
            {
                echo '<p id="success_reg" style="color:slateblue;"> Offer favorited! </p>';
            }
            ?>

            <h1 class="title_home"> Registration in progress </h1>

            <img src="pictures/loading.gif" class="icons" alt="loading icon" />

            <p>
                While we register you, why not start looking at volunteering opportunities? Just favorite the opportunities you might be interested in and sign up once you're logged in!
            </p>

            <br />
            <br />

            <!--PHP insert: Displays list of opportunities during registration process-->
            <?php include("regform/display_opp.php"); ?>

        </div>

        <!-- Include footer structure -->
        <?php include("elements_struc/footer.php"); ?>

    </body>
</html>