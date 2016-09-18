<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_responsive.css">
        <link rel="stylesheet" href="style_struc.css">
        <link rel="stylesheet" href="style_forms.css">
        <!-- Link script file for form validation -->
        <script type="text/javascript" src="loginform/validate_login.js"></script>
        <title> Login | Let'sVolunteer </title>
    </head>
    <body>

        <!-- Include header structure -->
        <?php include("elements_struc/header.php"); ?>

        <div class="block" id="main">

            <h1 class="title_home"> Login to your account </h1>

           <!-- Target paragraph for error message displaying -->
            <p id='targetlogin'> </p> <br/>
           
            <p>
                Use your email address and password chosen during registration to login and access to your dashboard!
            </p>

<br />                         
            <!-- PHP insert: receives variable from handlelogin.php
            If variable error is 1, send error message saying that no email was found
            If variable error is 2, send error message saying that the password is incorrect -->
            <?php
            if ( isset($_GET['error']) && $_GET['error'] == 1 )
            {
                echo '<p style="color:slateblue">No account found with this email address, please try again</p>';
            }
            if ( isset($_GET['error']) && $_GET['error'] == 2 )
            {
                echo '<p style="color:slateblue">Incorrect email/ password combinaison, please try again</p>';
            }
            ?>
           <br />                          

            <!-- Login form that get validated in validation.js and then input is treated in handlelogin.php-->
            <form onsubmit="return validate();" method="post" action="loginform/handlelogin.php">
               
                <div id="loginbox">
                    <label>Email address</label> <br />
                    <input type="type" name="loginemail"/> <br />
                    <label>Password</label> <br />
                    <input type="password" name="loginpassword"/>
                    <br />
                    <input type="submit" value="LOGIN" id="loginsubmit" />

                </div>

            </form>

        </div>

        <!-- Include footer structure -->
        <?php include("elements_struc/footer.php"); ?>

    </body>
</html>