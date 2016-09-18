<!DOCTYPE html>
<html lang="en">
    <head>
       <!-- Page 1 of 3 of the registration process -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_responsive.css">
        <link rel="stylesheet" href="style_struc.css">
        <link rel="stylesheet" href="style_forms.css">
        <script type="text/javascript" src="regform/validation1.js"></script>      <title> Register | Let'sVolunteer </title>
    </head>

    <body>

        <!-- Include header structure -->
        <?php include("elements_struc/header.php"); ?>

        <div class="block" id="main">

            <!-- Registration form that get validated by javascript before being handled by php-->
            <form onsubmit="return validate();" method="post" action="regform/handleform1.php">

                <fieldset> #1 Let's start by creating you an account </fieldset>    

                <!-- Target paragraph to display error message -->
                <p id="target"> </p> <br />
               
                <label>* First name</label> <br />
                <input type="text" name="fname"/> <br />
                <label>* Last name</label> <br />
                <input type="text" name="lname"/> <br />
                <label>* Email address</label> <br />
                <input type="email" name="email"/> <br />
                <label>* Password</label> <br />
                <input type="password" name="password"/> <br />
                <label>* Confirm password</label> <br />
                <input type="password" name="conf" />             
                
                <br />
                <input id="submit" type="submit" value="NEXT"/>

            </form>
            
            <br />
            
            <!-- Progress bar display -->
            <div id="progress">
            <progress value="20" max="100"> </progress>
            
            </div>
        </div>

        <!-- Include footer structure -->
        <?php include("elements_struc/footer.php"); ?>

    </body>
</html>