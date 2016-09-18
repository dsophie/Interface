<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_responsive.css">
        <link rel="stylesheet" href="style_struc.css">
        <link rel="stylesheet" href="style_forms.css">
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">

        <title> Home | Let'sVolunteer </title>
    </head>
    <body>

       <!-- When user is loging out, display an alert! -->
        <?php
        if (isset($_GET['logout']) && $_GET['logout'] == 1)
        {
        ?> <script> 
        swal("Logout successfull, goodbye!", "See you soon", "success");
        </script> <?php
        }
        ?>

        <!-- Include header structure -->
        <?php include("elements_struc/header.php"); ?>

        <div class="block" id="main">
           
            <h1 class="title_home"> What services do we provide? </h1>

            <div class="dividerh1">
                <div>
                    <h2 class="subtitle_home"> >> Looking to volunteer? </h2>

                    <p> We help you browse and find amazing volunteering opportunities from various organisations, all of it based on your preferences </p>

                    <img class="imghome" src="pictures/new-piktochart.png" alt="Infographic" />

                </div>

                <div class="button_home">
                    <a href="how_it_works.php"> Learn more </a>
                </div>

                <h2 class="subtitle_home"> >> Looking for volunteers? </h2>

                <p> We showcase your volunteering offers on our interface so our users can volunteer easily and you can get more and more volunteering registrations! To learn more about how you can partner with us to increase volunteering activity and get your organisation on the map, have a look at our detailed guide for organisations! </p>

                <img class="imghome" src="pictures/org.png" alt="Infographic" />

                <div class="button_home">
                    <a href="organisations.php"> Learn more </a>
                </div>

            </div>

            <div class="dividerh1">

                <h1 class="title_home"> Why should you join? </h1>

                <h2 class="subtitle_home"> >> Unsure about volunteering? </h2>

                <p> There are thousands of reasons for volunteering, but let us give you a glance at what can volunteering do for you! </p>

                <img class="imghome" src="pictures/home.png" alt="infographic" />

                <p> And if you still need some convicing, check out our argument against the most stated reason for not volunteering! </p>

                <img class="imghome" src="pictures/home1.png" alt="infographic" />

            </div>

            <div class="dividerh1">

                <h1 class="title_home"> Ready to get started? </h1>


                <p>
                    Registration is quick and easy, just follow the links below!
                </p>

                <div class="button_home">
                    <a href="register.php"> Register </a>
                </div>

            </div>
        </div>


        <!-- Include footer structure -->
        <?php include("elements_struc/footer.php"); ?>

    </body>
</html>