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

        <script> //redirect after 30seconds
            setTimeout(function () {
                window.location.href = "register_complete.php"; 
            }, 20000);
        </script>

    </head>

    <body>

        <!-- Include header structure -->
        <?php include("elements_struc/header.php"); ?>

        <div class="block" id="main">

            <h1 class="title_home"> Registration complete! </h1>

            <img src="pictures/ok.png" class="icons" alt="check icon" />

            <p>
                Login below to acces your dashboard and start your volunteering adventure!
            </p>

            <div class="button_home">
                <a href="login.php"> Login </a>
            </div>

        </div>

        <!-- Include fotter structure -->
        <?php include("elements_struc/footer.php"); ?>

    </body>
</html>