<!DOCTYPE html>
<html lang="en">
    <head>
       <!-- Page 3 of 3 of registration process -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_responsive.css">
        <link rel="stylesheet" href="style_struc.css">
        <link rel="stylesheet" href="style_forms.css">
        <script type="text/javascript" src="regform/validation3.js"></script>      
        <title> Register | Let'sVolunteer </title>
    </head>

    <body>

        <!-- Include header structure -->
        <?php include("elements_struc/header.php"); ?>

        <div class="block" id="main">

            <!-- Registration form that get validated in javascript before being handled by php-->
            <form onsubmit="return validate();" method="post" action="regform/handleform.php">

                <fieldset> #3 Let's talk about volunteering </fieldset>
                
                <p id="target"> </p> <br />

                <label> These questions will help us personnalize the opportunties we propose you. You will be able to change your answers later if you wish to.</label> 
                <br/>

                <div class="questions" id="Q1"> <!-- id for javascript validation -->      
                    <label>* 1. What is your principal motivation for volunteering, other than helping people and the community? </label>
                    <br />

                    <input type="radio" name="motivation" value="social" id="social" class="radio"/> <label for="social">Social motivations: Meeting new people, sharing a community spirit, taking pride in helping others, etc</label> <br />
                    <input type="radio" name="motivation" value="selfd" id="selfd" class="radio"/> <label for="selfd">Self-development motivations: Gaining new skills, learning about others, discovering a new sector activity, etc</label> 
                </div>

                <div class="questions" id="Q2"> <!-- id for javascript validation -->     
                    <label>* 2. In what kind of activities do wish to volunteer? (5 categories maximum) </label>
                    <br />

                    <input type="checkbox" name="admin" class="checkbox"/> <label>Administration</label> <br />
                    <input type="checkbox" name="animal" class="checkbox"/> <label>Animals</label> <br />
                    <input type="checkbox" name="arts" class="checkbox"/> <label>Arts </label> <br />
                    <input type="checkbox" name="caring" class="checkbox"/> <label>Caring</label> <br />
                    <input type="checkbox" name="child" class="checkbox"/> <label>Children and Families</label> <br /> 
                    <input type="checkbox" name="cooking" class="checkbox"/> <label>Cooking</label> <br />
                    <input type="checkbox" name="mentoring" class="checkbox"/> <label>Mentoring</label> <br />
                    <input type="checkbox" name="envir" class="checkbox"/> <label>Environment</label> <br />
                    <input type="checkbox" name="youths" class="checkbox"/> <label>Youths and Women</label> <br />
                    <input type="checkbox" name="allS" class="checkbox"/> <label>All</label> 
                </div>

                <div class="questions" id="Q3"> <!-- id for javascript validation -->      
                    <label>* 3. How much time can you allocate to volunteering each week? </label>
                    <br />

                    <input type="radio" name="time" value="10" id="more10" class="radio"/> <label for="more10">More than 10 hours </label> <br />
                    <input type="radio" name="time" value="310" id="between310" class="radio"/> <label for="between310">Between 3 and 10 hours </label> <br />
                    <input type="radio" name="time" value="3" id="less3" class="radio"/> <label for="less3">Less than 3 hours </label> <br />
                    <input type="radio" name="time" value="0" id="nopref" class="radio"/> <label for="nopref"> No preference </label> <br />               
                </div>

                <div class="questions" id="Q5"> <!-- id for javascript validation -->       
                    <label>* 4. What types of volunteering activities are you looking to take part in? </label>
                    <br />

                    <input type="radio" name="type" value="event" id="event" class="radio"/> <label for="event"> Event support </label> <br />
                    <input type="radio" name="type" value="comm" id="community" class="radio"/> <label for="community"> Community support </label> <br />
                    <input type="radio" name="type" value="no pref" id="nopref" class="radio"/> <label for="nopref"> No preference </label> <br />               
                </div>

                <input id="submit" type="submit" value="SUBMIT"/>

            </form>   
            <br />
                   <progress value="100" max="100"> </progress>       

        </div>

        <!-- Include header structure -->
        <?php include("elements_struc/footer.php"); ?>

    </body>
</html>