<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_responsive.css">
        <link rel="stylesheet" href="style_struc.css">
        <link rel="stylesheet" href="style_forms.css">
        <!-- Link javascript file that does the file validation -->
        <script type="text/javascript" src="contactusform/validate_contact.js"></script>
        <!-- Links for the sweetalert module used to display alerts -->
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
        <title> Contact Us | Let'sVolunteer </title>
    </head>
    <body>

       <!-- Include header structure to page -->
        <?php include("elements_struc/header.php"); ?>

        <div class="block" id="main">

            <h1 class="title_home"> Get in touch </h1>

            <p> We're here to help. Want to learn more about our services? Please get in touch, we'd love to hear from you!</p>

           <!-- Target paragraph for error message added during the form validation -->
            <p id="targetcontact"> </p>

            <!-- PHP insert: Use of variables set in the php form handler and if the variable 'success' is returned with a value of 1, send an alert for success-->
            <?php
            if ( isset($_GET['success']) && $_GET['success'] == 1 )
            {
                ?>
                <script> swal("Message sent", "Thank you for contacting us, we will get back to you as soon as possible", "success"); </script> <?php
            } 
            ?>

            <br />

            <!-- Create form which needs to be validated in validation.js before submit and get treated by handlecontact.php -->
            <form onsubmit="return validate();" id="contactus" method="post" action="contactusform/handlecontact.php">
                <label>Name</label> <br />
                <input type="text" name="name"/>
                <br />
                <label>Email address</label> <br />
                <input type="text" name="email"/>
                <br />
                <label>Phone number</label> <br />
                <input type="text" name="phone"/>
                <br />
                <label>Message</label> <br />
                <br />
                <textarea name="message"></textarea>

                <br />
                <input id="submit" type="submit" value="SUBMIT"/>

            </form>


        </div>

       <!-- Include footer structure to page -->
        <?php include("elements_struc/footer.php"); ?>

    </body>
</html>